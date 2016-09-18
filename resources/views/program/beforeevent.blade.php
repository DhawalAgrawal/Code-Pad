<?php
use App\program_details;
use App\ProgramRecord;
$add='';
if(Auth::guard('admin')->check()):
    $result = Auth::guard('admin')->user();
    $add='admin';
else:
    $result = Auth::guard('student')->user();
endif;
$event=ProgramRecord::find(Session::get('record_id'));
$code=$event->code;
$details=Program_Details::where('record_id',Session::get('record_id'))->get();
?>
@extends('layouts.layout')
    @section('body')
        <div class="custom-flash {{ $message['class'] }} ">{{ $message['message'] }}</div>
    @endsection
    @section('content')
        <div class="view-event container">
            <div class="event-info row">
                <div class="col-xs-12 col-sm-8">
                    <h1>{{ $event->name }}</h1>
                    <p><div><strong>Description:</strong>{!!$event->description!!}</div></p>
                    <p><div><strong>Instructions:</strong>{!!$event->instructions!!}</div></p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a class="btn btn-success ldr-bd"> <span class="fa fa-users "></span> Show Leaderboard </a>
                </div>
            </div>
            <div class="view-event row text-center">
                <!-- *** LEFT COLUMN *** -->
                <button class="btn btn-success"><a href="{{ url('event/register') }}">Register</a></button>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->


            </div>
            <!-- /.row -->
        </div>
    @endsection
    @section('script')
      <script>
        $('.countdown').ClassyCountdown({
          theme: "flat-colors",
          end: $.now() + 20,
          // custom style for the countdown
          style: {
            days:    { gauge: { thickness: 0.08 } },
            hours:   { gauge: { thickness: 0.08 } },
            minutes: { gauge: { thickness: 0.08 } },
            seconds: { gauge: { thickness: 0.08 } }
          },
          });
      </script>
    @endsection

