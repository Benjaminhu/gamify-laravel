<?php
/**
 * Gamify - Gamification platform to implement any serious game mechanic.
 *
 * Copyright (c) 2018 by Paco Orozco <paco@pacoorozco.info>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * Some rights reserved. See LICENSE and AUTHORS files.
 *
 * @author             Paco Orozco <paco@pacoorozco.info>
 * @copyright          2018 Paco Orozco
 * @license            GPL-3.0 <http://spdx.org/licenses/GPL-3.0>
 *
 * @link               https://github.com/pacoorozco/gamify-laravel
 */

namespace Tests\Feature\Http\Controllers;

use Gamify\Events\QuestionAnswered;
use Gamify\Models\Question;
use Gamify\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();

        $this->user = $user;
    }

    /** @test */
    public function it_should_show_the_questions_dashboard(): void
    {
        $this
            ->actingAs($this->user)
            ->get(route('questions.index'))
            ->assertSuccessful()
            ->assertViewIs('question.index')
            ->assertViewHasAll([
                'questions',
                'next_level_name',
                'points_to_next_level',
                'percentage_to_next_level',
                'answered_questions',
                'percentage_of_answered_questions',
            ]);
    }

    /** @test */
    public function it_should_response_not_found_when_question_is_not_published(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->create();

        $this
            ->actingAs($this->user)
            ->get(route('questions.show', $question->short_name))
            ->assertNotFound();
    }

    /** @test */
    public function it_should_show_the_question_when_it_is_not_answered(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        $this
            ->actingAs($this->user)
            ->get(route('questions.show', $question->short_name))
            ->assertSuccessful()
            ->assertViewIs('question.show')
            ->assertSeeText($question->name);
    }

    /** @test */
    public function it_should_add_the_user_response_after_answering(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        $this
            ->actingAs($this->user)
            ->post(route('questions.answer', $question->short_name), [
                // Answer with the first available choice.
                /** @phpstan-ignore-next-line */
                'choices' => [$question->choices()->first()->id],
            ])
            ->assertSuccessful()
            ->assertViewIs('question.show')
            ->assertViewHasAll([
                'response',
                'question',
            ]);

        $this->assertDatabaseHas('users_questions', [
            'question_id' => $question->id,
            'user_id' => $this->user->id,
        ]);
    }

    /** @test */
    public function it_fires_an_event_when_question_is_answered_correctly(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        // Answer with the correct choices.
        $choices = $question->choices()
            ->correct()
            ->pluck('id')
            ->toArray();

        Event::fake();

        $this->actingAs($this->user)
            ->post(route('questions.answer', $question->short_name), [
                'choices' => $choices,
            ])
            ->assertSuccessful();

        Event::assertDispatched(function (QuestionAnswered $event) use ($question) {
            return $event->question->id === $question->id
                && $event->correctness === true;
        });
    }

    /** @test */
    public function it_fires_an_event_when_question_is_answered_incorrectly(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        // Answer with the incorrect choice.
        $choices = $question->choices()
            ->incorrect()
            ->pluck('id')
            ->toArray();

        Event::fake();

        $this->actingAs($this->user)
            ->post(route('questions.answer', $question->short_name), [
                'choices' => $choices,
            ])
            ->assertSuccessful();

        Event::assertDispatched(function (QuestionAnswered $event) use ($question) {
            return $event->question->id === $question->id
                && $event->correctness === false;
        });
    }
}
