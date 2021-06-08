<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h3>{{ $details['title'] }}</h3>
    <p>{{ $details['body'] }}</p>
    @if ($details['bank'] != null)
    <p>Silahkan Transfer di pilihan bank di bawah ini</p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Account number</th>
            </tr>
            </thead>
            <tbody>  
            @foreach ($details['bank'] as $index=>$bank)
                <?php $index++;?>
                <tr>
                        <td>{{$index}}</td>
                        <td>{{$bank->name}}</td>
                        <td>{{$bank->owner}}</td>
                        <td>{{$bank->account_number}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Account number</th>
            </tr>
            </tfoot>
        </table>
    @endif
    Thank you
</body>
</html>