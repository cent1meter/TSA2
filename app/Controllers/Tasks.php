<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;

class Tasks extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index(): string
    {
        return view('tasks/index', [
            'title' => 'Task List',
            'tasks' => (new TaskModel())->activeTasks(),
        ]);
    }

    public function new(): string
    {
        return view('tasks/form', [
            'title' => 'New Task',
            'task' => null,
            'action' => site_url('tasks/create'),
        ]);
    }

    public function create(): RedirectResponse
    {
        $data = $this->taskData();
        if (! $this->validateData($data, $this->taskRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert($data);

        return redirect()->to('/tasks')->with('success', 'Task created successfully.');
    }

    public function edit(int $id): string
    {
        return view('tasks/form', [
            'title' => 'Edit Task',
            'task' => $this->findActiveTask($id),
            'action' => site_url("tasks/{$id}/update"),
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        $this->findActiveTask($id);
        $data = $this->taskData();

        if (! $this->validateData($data, $this->taskRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->update($id, $data);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully.');
    }

    public function delete(int $id): RedirectResponse
    {
        $this->findActiveTask($id);
        (new TaskModel())->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived successfully.');
    }

    private function taskData(): array
    {
        return [
            'title' => trim((string) $this->request->getPost('title')),
            'description' => trim((string) $this->request->getPost('description')),
            'task_date' => trim((string) $this->request->getPost('task_date')),
        ];
    }

    private function taskRules(): array
    {
        return [
            'title' => [
                'label' => 'Title',
                'rules' => 'required|min_length[3]|max_length[150]',
            ],
            'description' => [
                'label' => 'Description',
                'rules' => 'permit_empty|max_length[1000]',
            ],
            'task_date' => [
                'label' => 'Task date',
                'rules' => 'required|valid_date[Y-m-d]',
            ],
        ];
    }

    private function findActiveTask(int $id): array
    {
        $task = (new TaskModel())->where('id', $id)->where('is_archived', 0)->first();
        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        return $task;
    }
}
