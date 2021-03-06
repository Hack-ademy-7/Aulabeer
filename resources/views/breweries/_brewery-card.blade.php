<div class="col-12 col-md-4">
    <a href="{{route('breweries.show',['id'=>$brewery->id])}}" style="text-decoration: none;color:inherit">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://picsum.photos/200?a={{$loop->iteration}}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$brewery->name}} 
                <span class="badge bg-secondary">{{$brewery->capacity}}</span>
              </h5>
              <p class="card-text">{{$brewery->description}}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              <p class="card-text"><small class="text-muted">Created by <a href="{{route('users.show',['id'=>$brewery->user->id])}}">{{$brewery->user->name}}</a> </small></p>
              <a href="{{route('breweries.edit',['id'=>$brewery->id])}}" class="btn btn-warning btn-sm">Edit</a>
              <form id="deleteForm" action="{{route('breweries.destroy',['id'=>$brewery->id])}}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger btn-sm btnDelete">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </a>
</div>