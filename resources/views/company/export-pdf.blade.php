<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            font-size: 13px; 
        }
        h2 { 
            margin-bottom: 4px; 
        }
        p  {
            margin: 0 0 16px; 
            color: #000000; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 16px; 
        }
        thead { 
            background-color: #161411; 
            color: #fff; 
        }
        th, td { 
            padding: 10px 12px; 
            border: 1px solid #ddd; 
            text-align: left; 
        }
    </style>
</head>
<body>

    <h2>{{ $company->name }}</h2>
    <h5>Total employees: {{ $employees->count() }}</h5>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $index => $employee)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $company->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No employees found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>