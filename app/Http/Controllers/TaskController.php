<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequests;
use App\Model\TaskModel;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $tasks = TaskModel::orderBy('id', 'DESC')
                ->paginate(5, ['*'], 'trang');
        } else {
            $tasks = TaskModel::where('name', 'like', "%" . $request->search . "%")
                ->orWhere('phone', 'like', "%" . $request->search . "%")
                ->orWhere('email', 'like', "%" . $request->search . "%")
                ->paginate(10, ['*'], 'pagesearch');
        };

        return view('welcome', ['tasks' => $tasks]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if ($id != 0) {
            $task = TaskModel::find($id);
            return view('update',
                [
                    'id' => $id,
                    'task' => $task
                ]);
        } else {
            return view('insert');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequests $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $id = $request->id;
        if ($request->update) {
            $update = $this->update($request, $id, $name, $phone, $email);
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route('index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskModel $taskModel
     * @return \Illuminate\Http\Response
     */
    public function show(TaskModel $taskModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskModel $taskModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskRequests $request)
    {
        $tasks = new TaskModel();
        $tasks->name = "$request->name";
        $tasks->phone = $request->phone;
        $tasks->email = "$request->email";
        $tasks->save();
        Session::flash('success', 'Tạo mới thành công');
        return redirect(route('index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TaskModel $taskModel
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequests $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $id = $request->id;
        $update = TaskModel::where('id', $id)
            ->update([
                'name' => "$name",
                'phone' => $phone,
                'email' => "$email"
            ]);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskModel $taskModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = TaskModel::find($id)->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect(route('index'));
    }
}
