<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <title>Portfolio ~Profile~</title>
</head>
<body class="profilemain">
    <header class="top">
        <h2 class="portfolio">
            Portfolio<br>
            ~Shinsuke Goto~
        </h2>
    </header>

    <section class="profile">
        <h1>Profile</h1>
        <div class="profiletext">
            <img src="{{ asset('img/myimage.png') }}" alt="myimage">        
            <ul class="text">
                <li>Name: 後藤 紳助</li>
                <li>Age: 23 ~2001.01.19</li>
                <li>Birthplace: 宮崎</li>
                <li>Hobby: サーフィン・野球・ゴルフ</li>
                <li>-Workhistory-<br>　高校卒業後、千葉の化学会社に就職し化学プラントオペレーターとして5年間従事してきました。その中で、実際に制作物がユーザーにどのように使われているかなどが分かるエンジニア・プログラマーに魅力を感じ、エンジニア・プログラマーになるための基礎を学ぶことができるライブビジネススクールに入校して、基本情報技術者試験の勉強やHTML.CSS.PHPのプログラミング言語を学んできました。</li>
            </ul>
        </div>
    </section>

    <section class="work">
        <h1>Work</h1>
        <div class="worktext">
            <ul class="text">
                <li> ~作品~</li>
                <li><a href="{{ route('dashboard') }}">MY MLB ALLSTAR</a></li>
                <li>使用したもの: Laravel</li>
                <li>工数: 約100時間</li>
                <li>目的: 私がMLBが好きなため、自分の理想のオーダーを組めるようなサイトを作りたいと思ったからです。</li>
                <li>-Point-<br>　Laravelは投稿サイトを制作するのに適しているため、理想のオーダーを投稿・閲覧ができるようにしました。</li>
                <li>　オーダーを作成する際、守備位置を決めやすくするように野球場をイメージして作成しました。</li>
                <li>　Laravelを使用するのが今回が初めてだったので、まずはどういう機能なのか、どういう処理の流れなのかを理解するのに時間がかかりました。初めは何から手をつければ良いのかが分からなかったので参考書やサイトを参考にして、まずは手を動かしTry&Errorを繰り返しながら進めるように意識しました。そのことでLaravelに関する知識を深めていくことが出来ました。</li>
                
            </ul>
            <img src="{{ asset('img/work.png') }}" alt="work">
        </div>
    </section>

    <section class="skills">
        <h1>About</h1>
        <div class="skilltext">
            <img src="{{ asset('img/skills.png') }}" alt="skills">
            <ul class="text">
                <li>~Skills~</li>
                <li>使用できる言語: HTML.CSS.PHP(Laravel)</li>
                <li>資格:<br> ITパスポート試験"合格"</li>
                <li>Webクリエイター能力認定試験 エキスパート"合格"</li>
                <li>日本商工会議所簿記検定3級"合格"</li>
                <li>3級ファイナンシャル・プランニング技能士</li>
                <li>乙種危険物取扱者(3.4.5.6類)</li>
                <li>基本情報技術者試験(勉強中)</li>
                <li>-ビジョン-<br>　私は将来、お客様の課題解決や業務改善・効率化、そしてお客様に喜んでもらえるようなシステムを作成することができるエンジニアになりたいと考えています。そのようなエンジニアになるためにも、変化が著しいこのIT業界で現状の段階に満足するのではなく、何か分からないこと・知らないことがあった場合にはすぐに調べるなどを行なってプラスαで知識をつけていくことが大事だと考えているので、業務を通じて様々な知識や経験を積むことが出来る働き方がしていきたいと考えています。</li>
            </ul>
        </div>
    </section>
</body>
</html>