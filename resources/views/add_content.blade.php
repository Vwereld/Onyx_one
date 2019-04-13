<div class="col-lg-12 col-sm-12 col-md-12">
    <div class="short-table">
        <div class="clear">
            <a href="{{route('index')}}" class="btn-onyx">Clear all filters</a>
        </div>
        {{ Form::open(['action' => ['SearchController@search'], 'method' => 'GET']) }}
        <input type="hidden" name="_method" value="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="searchDiv">
            <div class="input-group">
                <span class="searchSpan">Select user:</span>
                <select class="dropdownHeader function" id="user_id" name="user">
                    <option value="0"></option>
                    @foreach($entries as $entry)
                        <option
                            value="{{$entry->users[0]->id}}"> {{$entry->users[0]->first_name}}{{$entry->users[0]->last_name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="input-group">
                <span class="searchSpan">Job:</span>
                <input type="text" name="job" value="{{request()->input('query')}}" placeholder="Search">
                <span class="input-group-btn">
            </span>
            </div>
            <div class="input-group">
                <span class="searchSpan">Reference:</span>
                <input type="text" name="reference" value="{{request()->input('query')}}" placeholder="Search">
                <span class="input-group-btn">
            </span>
            </div>
            <div class="input-group">
                <span class="searchSpan">OO ID:</span>
                <input type="text" name="OO_ID" value="{{request()->input('query')}}" placeholder="Search">
                <span class="input-group-btn">
        </span>
            </div>
            <div class="input-group status">
                <span class="searchSpan">Approval:</span>
                @foreach($entries as $entry)
                    <span style="font-style: italic">
            {{$entry->jobs[0]->approvals[0]->approval}}
                </span>
                    <input name="status" type="checkbox" value="{{$entry->jobs[0]->approvals[0]->approval}}">

                @endforeach
            </div>
        </div>

        <div class="searchDiv2">
            <div class="topnav">
                <div class="input-group">
                    <span class="searchSpan">Contractor:</span>
                    <input type="text" name="contractor" value="{{request()->input('query')}}" placeholder="Search">
                    <span class="input-group-btn">

        </span>
                </div>
            </div>
            <div class="input-group">
                <span class="searchSpan">Job types:</span>
                <select class="dropdownHeader function" id="type" name="job_type">
                    <option value="0">select job type</option>
                    @foreach($entries as $entry)
                        <option value="{{$entry->jobs[0]->job_type}}">{{$entry->jobs[0]->job_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <span class="searchSpan">Contact:</span>
                <input type="text" name="contact" value="{{request()->input('query')}}" placeholder="Search">
                <span class="input-group-btn">
            </span>
            </div>
            <div class="input-group status">
                <span class="searchSpan">Job status:</span>
                @foreach($entries as $entry)
                    <span style="font-style: italic">
            {{$entry->jobStatuses[0]->job_status}}
                </span>
                    <input name="job_status" type="checkbox" value="{{$entry->jobStatuses[0]->job_status}}">
                @endforeach
            </div>

        </div>
        {!! Form::button('Search',['class'=>'btn-onyx','type'=>'submit','style'=>'float: right; margin-top: 132px;margin-right: -65px;']) !!}
        {!! Form::close() !!}

        <div class="search_bottom">
            <a href="{{route('export')}}" class="btn-onyx">Export</a>
        </div>


        <div class="short-table">
            <table cellspacing="0" cellpadding="0" style="padding-top: 20px;">
                <thead>
                </thead>
                <tbody>
                <tr>
                    <td>JOB</td>
                    <td>CONTRACTOR</td>
                    <td>REFERENCE</td>
                    <td>JOB TYPE</td>
                    <td>START DATE</td>
                    <td>END DATE</td>
                    <td>FIRST NAME</td>
                    <td>LAST NAME</td>
                    <td>OO ID</td>
                    <td>STATUS PQ</td>
                    <td>ONSITE REQUIREMENT</td>
                    <td>AN PRINTED</td>
                    <td>PRINTED DATE</td>
                </tr>
                @foreach($entries as $entry)
                    <tr>
                        <td>
                            {{$entry->jobs[0]->job}}
                        </td>
                        <td>
                            {{$entry->companies[0]->contractor}}
                        </td>
                        <td>{{$entry->users[0]->reference}}</td>
                        <td>{{$entry->jobs[0]->job_type}}</td>
                        <td>
                            @if($entry->jobs[0]->start_date != Null){{$entry->jobs[0]->start_date}}
                            @else
                                <img src="{{asset('/img/error.png')}}" style="height: 25px; ">
                            @endif</td>
                        <td> @if($entry->jobs[0]->start_date != Null){{$entry->jobs[0]->end_date}}
                            @else
                                <img src="{{asset('/img/error.png')}}" style="height: 25px; ">
                            @endif</td>
                        <td>{{$entry->users[0]->first_name}}</td>
                        <td>{{$entry->users[0]->last_name}}</td>
                        <td>{{$entry->users[0]->OO_id}}</td>
                            @if($entry->users[0]->statuses[0]->Status == 'To be completed')
                            <td style ='background: #cccccc;'>
                                @elseif($entry->users[0]->statuses[0]->Status == 'Complete onsite training')
                            <td style ='background: orange;'>
                                @elseif($entry->users[0]->statuses[0]->Status == 'Not compliant')
                            <td style ='background: red;'>
                        @elseif($entry->users[0]->statuses[0]->Status == 'Compliant')
                            <td style ='background: lightgreen;'>
                            @endif
                            {{$entry->users[0]->statuses[0]->Status}}
                        </td>
                            @if($entry->users[0]->statuses[0]->Status == 'To be completed')
                                <td style ='background: #cccccc;'>
                            @elseif($entry->users[0]->statuses[0]->Status == 'Complete onsite training')
                                <td style ='background: orange;'>
                            @elseif($entry->users[0]->statuses[0]->Status == 'Not compliant')
                                <td style ='background: red;'>
                            @elseif($entry->users[0]->statuses[0]->Status == 'Compliant')
                                <td style ='background: lightgreen;'>
                                    @endif
                                    {{$entry->users[0]->statuses[0]->Status}}
                                </td>
                        <td>
                            @if($entry->jobStatuses[0]->an_printed !=0) <img src="{{asset('/img/check.png')}}"
                                                                             style="height: 25px;">
                            @else
                                <img src="{{asset('/img/error.png')}}" style="height: 25px;">
                            @endif</td>
                        <td>
                            @if($entry->jobStatuses[0]->printed_date !=null){{$entry->jobStatuses[0]->printed_date}}
                            @else  <img src="{{asset('/img/error.png')}}" style="height: 25px;">
                            @endif</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <span style="margin-left: 170px;">
            </span>
        </div>
    </div>
</div>

