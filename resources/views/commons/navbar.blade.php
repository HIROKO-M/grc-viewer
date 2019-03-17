<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">検索順位チェックツール　GRC</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('gdatas.showImportCSV')}}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>CSVファイルインポート
                    </a></li>
                     <li><a href="{{ route('pickupkeys.index')}}"> Pickup キーワード詳細ページへGo！</a></li>
                     
                     
                </ul>
            </div>
        </div>
    </nav>
</header>