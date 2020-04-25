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

namespace Gamify\Http\Controllers\Admin;

use Gamify\Badge;
use Gamify\Http\Requests\BadgeCreateRequest;
use Gamify\Http\Requests\BadgeUpdateRequest;
use Yajra\Datatables\Datatables;

class AdminBadgeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.badge.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.badge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BadgeCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BadgeCreateRequest $request)
    {
        try {
            Badge::create($request->validated());
        } catch (\Exception $exception) {
            return redirect()->back()
                ->withInput()
                ->with('error', __('admin/badge/messages.create.error'));
        }

        return redirect()->route('admin.badges.index')
            ->with('success', __('admin/badge/messages.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Badge $badge
     *
     * @return \Illuminate\View\View
     */
    public function show(Badge $badge)
    {
        return view('admin.badge.show', compact('badge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Badge $badge
     *
     * @return \Illuminate\View\View
     */
    public function edit(Badge $badge)
    {
        return view('admin.badge.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BadgeUpdateRequest $request
     * @param Badge              $badge
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BadgeUpdateRequest $request, Badge $badge)
    {
        try {
            $badge->update($request->validated());
        } catch (\Exception $exception) {
            return redirect()->back()
                ->withInput()
                ->with('error', __('admin/badge/messages.update.error'));
        }

        return redirect()->route('admin.badges.index')
            ->with('success', __('admin/badge/messages.update.success'));
    }

    /**
     * Remove badge page.
     *
     * @param Badge $badge
     *
     * @return \Illuminate\View\View
     */
    public function delete(Badge $badge)
    {
        return view('admin.badge.delete', compact('badge'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Gamify\Badge $badge
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Badge $badge)
    {
        try {
            $badge->delete();
        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', __('admin/badge/messages.delete.error'));
        }

        return redirect()->route('admin.badges.index')
            ->with('success', __('admin/badge/messages.delete.success'));
    }

    /**
     * Show a list of all badges formatted for Datatables.
     *
     * @param \Yajra\Datatables\Datatables $dataTable
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function data(Datatables $dataTable)
    {
        $badges = Badge::select([
            'id',
            'name',
            'required_repetitions',
            'active',
            'image_url',
        ])->orderBy('name', 'ASC');

        return $dataTable->eloquent($badges)
            ->addColumn('image', function (Badge $badge) {
                return sprintf('<img src="%s" width="96" class="img-thumbnail" alt="%s">', $badge->image, $badge->name);
            })
            ->editColumn('active', function (Badge $badge) {
                return ($badge->active) ? (string) __('general.yes') : (string) __('general.no');
            })
            ->addColumn('actions', function (Badge $badge) {
                return view('admin.partials.actions_dd')
                    ->with('model', 'badges')
                    ->with('id', $badge->id)
                    ->render();
            })
            ->rawColumns(['actions', 'image'])
            ->removeColumn('id', 'image_url')
            ->toJson();
    }
}
