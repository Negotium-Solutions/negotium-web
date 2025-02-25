<html>
    <body>
        <table class="table table-striped w-100" style="width:100%;">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Interest</th>
                            <th>Contacted</th>
                            <th style="width:1px;">Date Submitted</th>
                        </tr>
                    @forelse($cus as $cu)
                        <tr>
                            <td>{{ $cu->name }}</td>
                            <td><a href="mailto:{{ $cu->email }}">{{ $cu->email }}</a></td>
                            <td nowrap>{{ $cu->page }}</td>
                            <td nowrap>
                                @if($cu->contacted == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td nowrap>{{ $cu->created_at }}</td>
                        </tr>
                    @empty

                    @endforelse
</table>
</body>
</html>