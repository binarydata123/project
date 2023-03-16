<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>

    <title>Datepair.js &ndash; Demos and Documentation</title>
    <meta name="description" content="A javascript plugin for intelligently selecting date and time ranges inspired by Google Calendar." />
    <script type="text/javascript" src="/js/jquery.min.js"></script>

    <script src="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.css" />

    <script src="{{ asset('assets/timepicker/dist/datepair.js') }}"></script>
    <script src="{{ asset('assets/timepicker/dist/jquery.datepair.js') }}"></script>
</head>

<body>
    <section id="examples2">

        <article>
            <div class="demo2">
                <h2>Date-only Example</h2>

                <p>You can use datepair with just dates, or just times.</p>

                <p id="timeOnlyExample">
                    <input type="text" class="time start" /> to
                    <input type="text" class="time end" />
                </p>
            </div>

            <pre class="code" data-language="javascript">
// HTML not shown for brevity

$('#timeOnlyExample .time').timepicker({
    'showDuration': true,
    'timeFormat': 'g:ia'
});

var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);
            </pre>

            <script>
                $('#timeOnlyExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
                var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);

                
            </script>
        </article>

       
    </section>

</body>
</html>