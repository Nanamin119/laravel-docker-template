# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か

$todo = new Todo();
$todos = $todo->all();

### Todoモデルのallメソッドの返り値は何か

Illuminate\Database\Eloquent\Collectionクラスのインスタンス

### 配列の代わりにCollectionクラスを使用するメリットは

配列操作に特化しているから

### view関数の第1・第2引数の指定と何をしているか

bladeファイルを第一引数で指定
第二引数に渡したいデータを連想配列の形で渡す

### index.blade.phpの$todos・$todoに代入されているものは何か

$todosには、Controllerにて取得したCollectionインスタンスが代入されている
Collectionインスタンスに格納されているTodoインスタンスを一つずつ$todoとして取り出している

## Todo作成機能

### Requestクラスのallメソッドは何をしているか

フォームから送信された値を一括で取得するようにしている

### fillメソッドは何をしているか

Modelの->fill()を使用することで引数に指定した連想配列を一括代入できる

### $fillableは何のために設定しているか

一括代入には脆弱性があるため、代入できる項目に制限をかけるために設定している

### saveメソッドで実行しているSQLは何か

 $todo = new Todo();
 $todo->fill($inputs);
 $todo->save();

### redirect()->route()は何をしているか

リダイレクトさせる

## その他

### テーブル構成をマイグレーションファイルで管理するメリット

開発者全員が同じテーブルを作成することができる

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか

upはphp artisan migrateコマンドを実行
downはphp artisan migrate:rollbackコマンドを実行

### Seederクラスの役割は何か

テストデータを開発者間で共有できる役割

### route関数の引数・返り値・使用するメリット

引数には何を渡すのか？→ルート名　例：route('todo.create')
返り値は何が返ってくるのか？→ルートで設定したURLを生成　例：http://localhost:8080/todo/create
使用するメリット→Blade内のURLの記述が簡潔になり可読性が向上。またURLに変更がある場合でも、ルート名さえ変わらなければ修正箇所はweb.phpのみで済むため、保守性も向上する。

### @extends・@section・@yieldの関係性とbladeを分割するメリット

Bladeファイルを継承することができる

@section()と@yield()を紐づけている

複数のBladeを組み合わせて1枚のHTMLを生成することが可能になる

重複するコードを共通化して再利用できるようになるため、保守性が向上する

### @csrfは何のための記述か

CSRF攻撃を防ぐための記述
CSRF対策のためのトークンが含まれたinputタグが生成されている

### {{ }}とは何の省略系か

echo文の省略形