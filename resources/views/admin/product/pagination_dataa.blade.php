
                                               @foreach($data as $row)
      <tr>
       <td>{{ $row->id}}</td>
       <td>{{ $row->name }}</td>
       <td>{{ $row->price }}</td>
      </tr>
      @endforeach
      <tr>
       <td colspan="3" align="center">
        {!! $data->links() !!}
       </td>
      </tr>
