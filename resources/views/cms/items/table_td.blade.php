<td>{{$item->id}}</td><td>{{$item->city}}</td>

<td>{{$item->slug}}</td>

<td>{!! $item->description !!}</td>

<td>
                                {{$item->created_at}}
                                <b>({{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</b>
                            </td><td>
                                <a href="{{ route('cms.items.show', ['id' => $item->id]) }}" class="btn btn-secondary btn-sm">show</a>
                                <a href="{{ route('cms.items.edit', ['id' => $item->id]) }}" class="btn btn-success btn-sm">edit</a>
                                <a class="btn btn-danger btn-sm text-white" onclick="deleteItem({!! $item->id !!})">delete</a>
                            </td>