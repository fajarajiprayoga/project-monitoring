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
    <div class="grid grid-cols-8">
        <div class="col-start-2 col-span-6">
            <a href="{{ route('project.create') }}"><button
                    class="bg-gray-600 w-full p-2 text-center text-white mx-auto mb-2 rounded-md">add
                    new
                </button></a>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-md">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                No
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Product name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Client
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Project Leader
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Start Date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                End Date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Progress
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $key => $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6">
                                    {{ $key + 1 }}
                                </td>
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->project_name }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $item->client }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item->project_leaders->name }}
                                    {{ $item->project_leaders->email }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ date('d/m/Y', strtotime($item->start_date)) }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ date('d/m/Y', strtotime($item->end_date)) }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <label class="font-bold" for="">{{ $item->progress }}%</label>
                                    <progress class="apperance-none" id="file" value="{{ $item->progress }}"
                                        max="100">
                                    </progress>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex">
                                        <a href="{{ route('project.edit', $item->id) }}"><button
                                                class="bg-yellow-500 p-2 text-white"><i
                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                        <form action="{{ route('project.destroy', [$item->id]) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button class="bg-red-500 p-2 text-white"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
