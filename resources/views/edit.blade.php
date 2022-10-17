<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('css.style')
</head>

<body class="bg-emerald-100">
    <h1 class="text-3xl font-bold text-center my-5">
        Project Monitoring
    </h1>
    <div class="grid grid-cols-4">
        <div class="col-start-2 col-span-2 bg-white p-4 rounded-md">
            <form action="{{ route('project.update', $data->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-6">
                    <label for="project_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Project Name</label>
                    <input type="text" name="project_name" id="project_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $data->project_name }}">
                </div>
                <div class="mb-6">
                    <label for="client"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Client</label>
                    <input type="text" name="client" id="client"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700"
                        value="{{ $data->client }}">
                </div>
                <div class="mb-6">
                    <label for="project_leader"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Project Leader</label>
                    <select id="select-leader" name="leader_id">
                        <option value="{{ $data->leader_id }}">{{ $data->project_leaders->name }}</option selected>
                        @foreach ($p_lead as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="start_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start
                        Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700"
                        value="{{ $data->start_date }}">
                </div>
                <div class="mb-6">
                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">End
                        Date</label>
                    <input type="date" name="end_date" id="end_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700"
                        value="{{ $data->end_date }}">
                </div>
                <div class="mb-6">
                    <label for="progress"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Progress (%)</label>
                    <input type="text" name="progress" id="progress"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700"
                        value="{{ $data->progress }}">
                </div>


                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <a href="{{ route('project.index') }}"><button type="button"
                        class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</button></a>
            </form>
        </div>
    </div>
</body>

</html>
