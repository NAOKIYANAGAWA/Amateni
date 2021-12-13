リポジトリを変更しました。<br>
OLD↓<br>
https://github.com/NAOKIYANAGAWA/amateni_old<br>

# サイト名：アマテ二

# URL
https://amateurtennis.shop/amateni/

### ログイン情報
#### Email:<br>
admin@gmail.com<br>
#### パスワード：<br>
admin<br>

# このサイトについて
### サイト説明
アマチュアテニスプレーヤーが個人間で行った試合の結果を登録し、試合結果に応じたポイントでランキングを競う為のサイト

### このサイトの目的
・試合結果を記録することによって分析をできるようにする<br>
・ランキング形式で競うことによりモチベーションを高める<br>
・テニスをより多くの人に認知してもらう<br>
・適切なレベルのプレーヤーと試合ができるようにする（将来的に実装予定）<br>

### このサイトを開発した理由
テニスをもっと楽しめるようにしたいと思い、その時に思いついたのが全国のプレーヤーとランニングで競うことでした。<br>
ランキングで競う事により、ただ試合を行うのではなく、ランキングで上位に行けるよう勝つために、考えてプレーできるようになるのではないかと思いました。<br>
それ以外にも、他のユーザーの過去の試合履歴からそのユーザーの過去の対戦相手とレベルが確認できるので、<br>
自分のレベルに近い相手探してより質の高い試合を行えるようにできるすることも、このサイトを開発すた理由のひとつです。<br>

# 環境・使用技術
#### 開発環境
   - docker
   - Cyberduck
   - VScode
   - Sequel Pro
   - Sourcetree
   - Github
#### 使用技術
   - Ajax
   - API(Google maps platfrom)
#### サーバー
   - CentOS
#### フロントエンド
   - JavaScript
   - CSS(Sass)
   - HTML
#### バックエンド
   - PHP
#### DB
   - MySQL
#### 本番環境
   - XREAレンタルサーバー
   
# 主な機能
#### 対戦相手チェック
存在する対戦相手かを非同期通信（ajax）でチェックし、存在する場合のみファームを送信できます。
![kouseizu](https://user-images.githubusercontent.com/73929004/144736096-e5195c15-d968-4eff-875c-4de8c0048000.png)
![kouseizu](https://user-images.githubusercontent.com/73929004/144736108-fa79441e-683f-4ab7-b779-90e9c131114d.png)

#### チャット機能
対戦したプレーヤーとチャットができます。
![kouseizu](https://user-images.githubusercontent.com/73929004/145503242-4e5e65af-cae6-41c7-8f05-f982de5d3df3.png)
![kouseizu](https://user-images.githubusercontent.com/73929004/145503444-1eac209f-9861-4757-a08c-b971d4091ada.png)

#### 施設名から市区町村名を自動で入力
Google Maps API(Geocoding API, Maps JavaScript API)を利用して施設名から市区町村を取得して自動で入力します。
![kouseizu](https://user-images.githubusercontent.com/73929004/144736288-1067dcbe-ba66-4c36-98b2-c831fedbe55f.png)

## ABOUT ME
Qiita
https://qiita.com/naoki_y
