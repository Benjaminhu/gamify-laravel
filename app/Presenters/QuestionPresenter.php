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

namespace Gamify\Presenters;

use Gamify\Models\Question;
use Illuminate\Support\HtmlString;
use Laracodes\Presenter\Presenter;

class QuestionPresenter extends Presenter
{
    /** @var Question */
    protected $model;

    public function publicUrl(): string
    {
        return route('questions.show', ['questionname' => $this->model->short_name]);
    }

    /**
     * Returns the question status as a badge.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function statusBadge(): HtmlString
    {
        return new HtmlString(sprintf(
            '<span class="label %s">%s</span>',
            $this->mapStatusToLabel($this->model->status),
            trans('admin/question/model.status_list.'.$this->model->status)
        ));
    }

    /**
     * Map a Question status to a color label.
     *
     * @param  string  $status
     * @param  string  $default
     * @return string
     */
    protected function mapStatusToLabel(string $status, string $default = 'label-default')
    {
        $LabelToColorDict = [
            Question::DRAFT_STATUS => 'label-default',
            Question::PUBLISH_STATUS => 'label-success',
            Question::FUTURE_STATUS => 'label-info',
            Question::PENDING_STATUS => 'label-warning',
        ];

        return $LabelToColorDict[$status] ?? $default;
    }

    /**
     * Returns the question visibility as a badge.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function visibilityBadge(): HtmlString
    {
        return new HtmlString($this->model->hidden
            ? '<span class="label label-default">'.trans('admin/question/model.hidden_yes').'</span>'
            : ''
        );
    }

    public function visibility(): string
    {
        return $this->model->hidden
            ? trans('admin/question/model.hidden_yes')
            : trans('admin/question/model.hidden_no');
    }

    /**
     * Returns the statement of the question.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function statement(): HtmlString
    {
        return new HtmlString((string) $this->model->question);
    }

    /**
     * Returns the explanation of the question.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function explanation(): HtmlString
    {
        return new HtmlString((string) $this->model->solution);
    }

    /**
     * Returns the public link to the question.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function publicUrlLink(): HtmlString
    {
        return new HtmlString(sprintf(
            '<a href="%s" target="_blank" class="text-muted"><i class="fa fa-link"></i></a>',
            route('questions.show', ['questionname' => $this->model->short_name]),
        ));
    }

    /**
     * Returns an icon depending question type.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function typeIcon(): HtmlString
    {
        return new HtmlString(sprintf(
            '<i class="fa fa-tags" data-toggle="tooltip" title="%s"></i><span class="hidden">%s</span>',
            trans('admin/question/model.type_list.'.$this->model->type),
            (string) $this->model->type,
        ));
    }

    public function publicationDateDescription(): string
    {
        return match ($this->model->status) {
            Question::PUBLISH_STATUS => trans('admin/question/model.published_on',
                ['datetime' => $this->publicationDate()]),
            Question::FUTURE_STATUS => trans('admin/question/model.scheduled_for',
                ['datetime' => $this->publicationDate()]),
            default => trans('admin/question/model.published_not_yet'),
        };
    }

    public function publicationDate(): string
    {
        return empty($this->model->publication_date)
            ? ''
            : $this->model->publication_date->format('Y-m-d H:i');
    }
}
