<!-- <feedlot-id></feedlot-id> -->

<body ng-controller="TestController">

    <div class="container">

        <div ng-tabs class="tabbable">

            <ul class="nav nav-tabs">
                <li ng-tab-head>
                    <a href="#" ng-click="$event.preventDefault()">Tab 1</a>
                </li>
                <li ng-tab-head>
                    <a href="#" ng-click="$event.preventDefault()">Tab 2</a>
                </li>
                <li ng-tab-head="active">
                    <a href="#" ng-click="$event.preventDefault()">Tab 3</a>
                </li>
                <li ng-tab-head>
                    <a href="#" ng-click="$event.preventDefault()">Tab 4</a>
                </li>
            </ul>

            <div class="tab-content" style="overflow: hidden">
                <div ng-tab-body="animated bounceInLeft" class="tab-pane">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                        <li>Aliquam tincidunt mauris eu risus.</li>
                        <li>Vestibulum auctor dapibus neque.</li>
                    </ul>
                </div>
                <div ng-tab-body="animated fadeInUpBig" class="tab-pane">
                    <p>Feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                </div>
                <div ng-tab-body="animated fadeInRightBig" class="tab-pane">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
                <div ng-tab-body="animated bounceInDown" class="tab-pane">
                    <h2>These tabs without animation</h2>

                    <div ng-tabs class="tabbable">
                        <ul class="nav nav-tabs">
                            <li ng-tab-head>
                                <a href="#" ng-click="$event.preventDefault()">Tab 1</a>
                            </li>
                            <li ng-tab-head="on">
                                <a href="#" ng-click="$event.preventDefault()">Tab 2</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div ng-tab-body class="tab-pane">
                                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            </div>
                            <div ng-tab-body class="tab-pane">
                                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
