@extends('home')

@section('cont')
<h3 class="p-3 display-4">Dashboard</h3><hr>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card bg-dark text-light">
                <div class="card-header text-center bg-dark">Tree Removals This Month</div>
                    <div class="card-body text-center text-light">
                        <p class="card-text display-1">12</p>
                    </div>
            </div>
        </div>
        <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center bg-dark">Tree Removals This Month</div>
            <div class="card-body text-center text-light">
                <p class="card-text display-1">5</p>
            </div>
        </div>
        </div>
    </div>
    <hr>
    <div class="row border-secondary rounded-lg ml-3">
      <h5 class="p-3">Pending Requests</h5>
      <table class="table table-dark table-striped mr-4">
        <thead>
        <tr>
            <th>Category</th>
            <th>Date Submitted</th>
            <th>User</th>
            <th>Check</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Tree Removal</td>
            <td>2020/12/12</td>
            <td>Saman Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        <tr>
            <td>Development Project</td>
            <td>2020/11/14</td>
            <td>Asel Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        <tr>
            <td>Tree Removal</td>
            <td>2020/10/5</td>
            <td>Sharuka Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        <tr>
            <td>Environment Restoration</td>
            <td>2020/10/4</td>
            <td>Sharuka Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        </tbody>
    </table>
    </div>
@endsection