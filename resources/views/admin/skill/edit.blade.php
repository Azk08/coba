<x-head_admin></x-head_admin>


<form action="{{ route('skill.update', $skill) }}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $skill->title }}">
</div>
  <div class="mb-3">
    <label for="description" class="form-label">description</label>
    <textarea name="description" class="form-control">{{ $skill->description }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<x-script_admin></x-script_admin>