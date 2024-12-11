<x-head_admin></x-head_admin>

<body class="p-5">
    <h3>Detail</h3>
    Title : {{ $skill->title }}
    <br>
    <br>
    Description : {{ $skill->description }}
    <br>
    <br>
    <a href="{{ route('skill.index') }}" class="btn">back</a>
</body>


<x-script_admin></x-script_admin>
