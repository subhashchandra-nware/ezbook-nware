 @php
     // dd($data);
     extract($data);
 @endphp

    <div class="card card-custom">

        <div class="card-header" id="ajax-header">
            <div class="card-title">
                <h3 class="card-label">{{ $Name }}</h3>
            </div>
            <pre id="ajax-test"></pre>
            <div class="card-toolbar">
                {{-- <a href="#" class="btn btn-primary font-weight-bold">
                    <i class="ki ki-plus icon-md mr-2"></i>Add Event</a> --}}

                    @if (count($sub_resource) > 0)

                    <form class="form p-5">
                        <div class="form-group mb-0">
                            <select class="form-control form-control-md " id="show">
                                <option>All</option>
                                <option>Any</option>
                                @foreach ($sub_resource as  $sub)
                                <option value="{{ $sub['ID']}}">{{$sub['Name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    @endif
            </div>
        </div>

        <div class="card-body">
            <div id="calendar"></div>
            <div id="kt_calendar"></div>
        </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
