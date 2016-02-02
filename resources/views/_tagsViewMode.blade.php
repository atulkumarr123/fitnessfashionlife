<div class="tagContainer">
    <label for="description">Tags:</label>
    @foreach ($selectedTags as $selectedTag)
        <a class="tag" href="#" target="_blank">
            {{$selectedTag}}
        </a>
    @endforeach
</div>