<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <form action="{{ url('update-employee/'.$employee->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value = "{{ $employee->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" value = "{{ $employee->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date" value="birth_date" value="{{ $employee->birth_date}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" name="salary" value = "{{ $employee->salary}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select name="department" class="form-control">
                    <option value="">Select Department</option>
                    <option value="Accounting" {{ $employee ->department=='Accounting'?'selected':'' }}>Accounting</option>
                    <option value="HRM" {{ $employee ->department=='HRM'?'selected':'' }}>Human Resource Management</option>
                    <option value="Management" {{ $employee ->department=='Management'?'selected':'' }}>Management</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Male" {{ $employee ->gender=='Male'?'checked':'' }}>Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Female" {{ $employee ->gender=='Female'?'checked':'' }}>Female
                    </label>
                </div>
                <div class="form-check ">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Other"{{ $employee ->gender=='Other'?'checked':'' }}>Other
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" cols="30" rows="5" class="form-control">
                {{ $employee->address}}
                </textarea>
                
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" value="1" {{ $employee ->status==1?'checked':'' }}>Status
                    </label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="update">
            </div>

        </form>
    </div>
</body>

</html>