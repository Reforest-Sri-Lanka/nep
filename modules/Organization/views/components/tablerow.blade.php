<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    @switch($user->organization)
    @case('0')
    <td>Reforest Sri Lanka</td>
    @break;
    @case('1')
    <td>Ministry of Environment</td>
    @break;
    @case('2')
    <td>Central Environmental Authority</td>
    @break;
    @case('3')
    <td>Ministry of Wildlife</td>
    @break;
    @case('4')
    <td>Road Development Authority</td>
    @break;
    @default
    <td>Other</td>
    @endswitch
    <td>{{$user->email}}</td>
    @switch($user->role)
    @case('0')
    <td>Unassigned</td>
    @break;
    @case('1')
    <td>Super Admin</td>
    @break;
    @case('2')
    <td>Admin</td>
    @break;
    @case('3')
    <td>Head Of Organization</td>
    @break;
    @case('4')
    <td>Manager</td>
    @break;
    @case('5')
    <td>Staff</td>
    @break;
    @case('6')
    <td>Citizen</td>
    @break;
    @endswitch
    @switch($user->status)
    @case('0')
    <td>Inactive</td>
    @break;
    @case('1')
    <td>Active</td>
    @break;
    @endswitch
    <td class="text-center"><a href="/admin/more/{{$user->id}}" class="btn btn-outline-info mr-4" role="button">...</a></td>
    <td class="text-center"><a href="/admin/changePrivilege/{{$user->id}}" class="btn btn-outline-info" role="button">Privilege</a></td>
    <td><a href="/admin/edit/{{$user->id}}" class="btn btn-outline-warning" role="button">Edit</a></td>
    <td>
        <button class="btn btn-outline-danger" onclick="event.preventDefault();
                            document.getElementById('form-delete-{{$user->id}}').submit()">Delete</button>

        <form id="{{'form-delete-'.$user->id}}" style="display:none" method="post" action="/admin/delete/{{$user->id}}">
            @csrf
            @method('delete');
        </form>
    </td>
</tr>


