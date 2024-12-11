<div class="user-list" id="user-list">
    @if($users->isEmpty())
        <p>No users found matching your search criteria.</p>
    @else
         <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            @foreach($users as $user)
                <div class="user-card">
                    <h3>{{ $user->name }}</h3>
                    <p>Designation: {{ $user->designation_name }}</p>
                    <p>Department: {{ $user->department_name }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>