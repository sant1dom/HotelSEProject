@extends('layouts.mainlayout')

@section('content')
<div class="container">
    <button class="btn btn-warning" onclick="bootstrapAlert()">click</button>
</div>


<script>
    $(function() {
        $.bootstrapGrowl("This is a test.");

        setTimeout(function() {
            $.bootstrapGrowl("This is another test.", { type: 'success' });
        }, 1000);

        setTimeout(function() {
            $.bootstrapGrowl("Danger, Danger!", {
                type: 'error',
                align: 'center',
                width: 'auto',
                allow_dismiss: false
            });
        }, 2000);

        setTimeout(function() {
            $.bootstrapGrowl("Danger, Danger!", {
                type: 'info',
                align: 'left',
                stackup_spacing: 30
            });
        }, 3000);
    });
</script>
@endsection

