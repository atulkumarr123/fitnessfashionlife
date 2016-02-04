<div class="tagContainer">
    <label class="tagLabel" for="description">Tags:</label>
    <div>
    @foreach ($selectedTags as $selectedTag)
        <a class="tag" href="#" target="_blank">
            {{$selectedTag}}
        </a>
    @endforeach
        </div>
</div>