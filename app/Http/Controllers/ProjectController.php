<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'projects' => Project::with('tags')->latest()->get()
        ]);
    }
    public function create()
    {
        return Inertia::render('Admin/Projects/Create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(StoreProjectRequest $request)
    {
        DB::transaction(function () use ($request) {
            // Create project
            $project = Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'background_image' => $request->hasFile('background_image')
                    ? $request->file('background_image')->store('projects', 'public')
                    : null
            ]);

            // Store project images
            if ($request->hasFile('project_images')) {
                foreach ($request->file('project_images') as $image) {
                    $project->projectImages()->create([
                        'image_path' => $image->store('project-images', 'public')
                    ]);
                }
            }

            // Attach tags
            if ($request->tags) {
                foreach ($request->tags as $tagName) {
                    // Find or create the tag
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
                // Attach the tags using collected IDs
                $project->tags()->attach($tagIds);
            }

            // Create additional content
            if ($request->additional_contents) {
                foreach ($request->additional_contents as $content) {
                    $additionalContent = $project->additionalContents()->create([
                        'type' => $content['title'],
                        'description' => $content['content']
                    ]);

                    // Store additional content images
                    if (isset($content['images'])) {
                        foreach ($content['images'] as $image) {
                            $additionalContent->images()->create([
                                'image_path' => $image->store('additional-content-images', 'public')
                            ]);
                        }
                    }
                }
            }
        });

        return redirect()->route('admin.dashboard');
    }

    public function edit(Project $project)
    {
        return Inertia::render('Admin/Projects/Edit', [
            'project' => $project->load(['tags', 'projectImages', 'additionalContents.images']),
            'tags' => Tag::all()
        ]);
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        DB::transaction(function () use ($request, $project) {
            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            if ($request->hasFile('background_image')) {
                $project->update([
                    'background_image' => $request->file('background_image')->store('projects', 'public')
                ]);
            }

            // Update additional contents
            if ($request->additional_contents) {
                foreach ($request->additional_contents as $index => $content) {
                    $additionalContent = $project->additionalContents()->updateOrCreate(
                        ['id' => $content['id'] ?? null],
                        [
                            'type' => $content['title'],
                            'description' => $content['content']
                        ]
                    );

                    // Only handle new images if they exist
                    if (isset($content['images']) && is_array($content['images'])) {
                        foreach ($content['images'] as $image) {
                            $additionalContent->images()->create([
                                'image_path' => $image->store('additional-content-images', 'public')
                            ]);
                        }
                    }
                }

                // Remove any old sections that weren't included in the update
                $existingIds = collect($request->additional_contents)->pluck('id')->filter();
                $project->additionalContents()
                    ->whereNotIn('id', $existingIds)
                    ->delete();
            }

            // Handle tags
            if ($request->tags) {
                $tagIds = [];
                foreach ($request->tags as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
                $project->tags()->sync($tagIds);
            }
        });

        return redirect()->route('admin.dashboard');
    }

    public function ListWorks()
    {
        return Inertia::render('ListWorks', [
            'projects' => Project::with('tags')->latest()->get()
        ]);
    }

    public function show(Project $project)
    {
        return Inertia::render('Work', [
            'project' => $project->load([
                'tags',
                'projectImages',
                'additionalContents' => function ($query) {
                    $query->orderBy('id', 'asc');
                },
                'additionalContents.images'
            ])
        ]);
    }
}
