<div class="">

    {!! $extraButton??"" !!}
    <a href="{{route($route.'.show', [$param=> $value] )}}" class="btn-sm btn btn-icon btn-3 btn-primary mr-2  {{$enableBottomMargin??false?"mb-2":""}}">
        <span class="btn-inner--icon"><i class="material-icons text-xs">remove_red_eye</i></span>
        <span class="btn-inner--text">View</span>
    </a>


    <a href="{{route($route.'.edit', [$param=> $value] )}}"
        class="btn-sm btn btn-icon btn-3 btn-warning mr-2">
        <span class="btn-inner--icon"><i class="material-icons text-xs">edit</i></span>
        <span class="btn-inner--text">Edit</span>
    </a>
    <form action="{{route($route.'.destroy', [$param=> $value] )}}" method="post" class="d-inline-block">
        @method('delete')
        @csrf
        <button type="submit"
            class="btn-sm btn btn-icon btn-3 btn-danger mr-2">
            <span class="btn-inner--icon"><i class="material-icons text-xs">delete_forever</i></span>
            <span class="btn-inner--text">Delete</span>
        </button>
    </form>
</div>
