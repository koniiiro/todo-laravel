<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz11 - 一覧画面</title>
    <style>
           table {
        border-collapse: collapse;  /* 罫線を重ねる */
        margin: 20px 0;             /* 上下の余白 */
    }
    th, td {
        border: 1px solid black;    /* 1pxの黒枠 */
        padding: 8px;               /* 内側の余白 */
        text-align: left;           /* 左揃え */
    }
    th {
        background-color: #f2f2f2;  /* ヘッダーの背景色 */
    }
    h2 {
        margin-top: 30px;           /* 見出しの上余白 */
    }
    </style>
</head>

<body>
    <h2>Companiesテーブル</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>会社名</th>
            <th>創立日</th>
            <th>住所</th>
        </tr>
        @foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->founding_date }}</td>
            <td>{{ $company->address }}</td>
        </tr>
        @endforeach
    </table>

    <h2>salesテーブル</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>会社ID</th>
            <th>売上</th>
            <th>売上日</th>
        </tr>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->id }}</td>
            <td>{{ $sale->company_id }}</td>
            <td>{{ $sale->sales }}</td>
            <td>{{ $sale->sales_date }}</td>
        </tr>
        @endforeach
    </table>    
</body>
</html>