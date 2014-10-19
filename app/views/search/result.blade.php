@foreach ($result_list as $result)
    @forelse($result as $r)
          <p>{{ $r->title }}</p>
    @empty
          <p>Не найдено</p>
    @endforelse
@endforeach