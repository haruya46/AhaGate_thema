<style>
.top {
  background-image: url('<?php echo get_template_directory_uri(); ?>/asset/img/24016262_m.jpg');
  background-size: cover;
  background-position: center;
  width: 100%;
  height: 400px;
}
</style>
<?php get_header(); ?>

<main>
    <div class="top">
        <div>
            <p>自走力</p>
            <p>×</p>
            <p>継続力</p>
        </div>
        <p>に特化したプログラミングスクール</p>

    </div>
    <div>
        <div>
            <h2 id="about">ProProとは？</h2>
            <span></span>
        </div>

        <div class="about01">
            <div>
                <p>01</p>
                <div></div>
            </div>
            <div>
                <p>ProProで受けれるサービス</p>
                <ul>
                    <li>月４回の75分間のzoom</li>
                    <li>LINEにて質問し放題</li>
                    <li>スケジュール管理</li>
                </ul>
            </div>
        </div>
        <div class="about02">
            <div>
                <p>コースについて</p>
                <p>ビギナーコース</p>
                <ul>
                    <li>
                        これからプログラミングを勉強し始める方向けになります。
                    </li>
                    <li>プロゲートを利用し1から学んでいただきます。</li>
                </ul>
                <p>プロコース</p>
                <ul>
                    <li>
                        基礎はプロゲートで学んだ方におすすめのコースです。
                    </li>
                    <li>作りたいポートフォリオをアジャイル開発方式で要件定義からデプロイまでを
                        自身の力で行ってもらいます。
                    </li>
                </ul>
            </div>
            <div>
                <p>02</p>
                <div></div>
            </div>
        </div>

        <div class="about03">
            <div>
                <p>02</p>
                <div></div>
            </div>
            <div>
                <p>学べる内容</p>
                <p>ビギナーコース</p>
                <ul>
                    <li>HTML CSS</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                    <li>コマンド</li>
                    <li>Git</li>
                </ul>
                <p>プロコース</p>
                <ul>
                    <li>laravel</li>
                    <li>デプロイ方法</li>
                </ul>
            </div>

        </div>

        <div class="about04">
            <div>
                <p>料金について</p>
                <ul>
                    <li>月額30,000円</li>
                    <li>途中解約可能！</li>
                    <li>1ヶ月単位でのお支払い</li>
                    <li>入会金や違約金などはありません</li>
                </ul>
            </div>
            <div>
                <p>04</p>
                <div></div>
            </div>

        </div>

        <div class="btn">
            <a href="">個別相談に申し込む／お問い合わせ</a>

        </div>

        <div>
            <div>
                <h2>ProProの学習ステップ</h2>
                <span></span>

            </div>
            <div>
                <p>ビギナーコース</p>
                <div>
                    <div>
                        <p>1</p>
                        <p>初月〜2ヶ月</p>
                    </div>
                    <span></span>
                    <p>プロゲートにて指定のコースを進めていただきます。</p>
                    <p>
                        わからない点や不明な点はzoomやLINEにて対応させていただきます。
                    </p>
                </div>

                <div>
                    <div>
                        <p>2</p>
                        <p>3ヶ月</p>
                    </div>
                    <span></span>
                    <p>プロゲートを全て完了後簡単なコーディングテストに挑んでいただきます。</p>
                    <p>
                        コーディングテスト完了後にはプロコースの受講を希望の方は
                        プロコースに進むことが可能です。
                    </p>
                </div>

            </div>

            <div>
                <p>プロコース</p>
                <div>
                    <div>
                        <p>1</p>
                        <p>初月</p>
                    </div>
                    <span></span>
                    <p>ビギナーコースで学んだことを元にPHPのフレームワークlaravelの環境構築を進めていきます。
                    </p>
                </div>

                <div>
                    <div>
                        <p>2</p>
                        <p>2ヶ月</p>
                    </div>
                    <span></span>
                    <p>「laravelの教科書」を参考にlaravelの基礎を学習します。</p>
                </div>
                <div>
                    <div>
                        <p>3</p>
                        <p>3ヶ月</p>
                    </div>
                    <span></span>
                    <p>作りたいwebアプリを決め要件定義や設計を作成し制作に取り掛かります。</p>
                    <p>ビギナーコースから加入された方は7ヶ月で卒業を目指します。</p>
                    <p>プロコースの方は4ヶ月を目標に卒業します。</p>
                </div>

            </div>
        </div>

        <div>
            <div>
                <h2>口コミ</h2>
                <span></span>
            </div>

            <?php
                $args = [
                'post_type' => 'review',
                'posts_per_page' => 5, // 必要に応じて数を調整
                ];
                $reviews = new WP_Query($args);

                if ($reviews->have_posts()) :
                    while ($reviews->have_posts()) : $reviews->the_post();
                    $portfolio_url = get_post_meta(get_the_ID(), 'portfolio_url', true);
                ?>
                    <div class="review">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="review_thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                        <?php endif; ?>
                
                        <p class="review_content"><?php the_content(); ?></p>
                        <p class="review_name"><?php the_title(); ?></p>
                
                        <?php if ($portfolio_url) : ?>
                        <p class="review_portfolio">
                            <a href="<?php echo esc_url($portfolio_url); ?>" target="_blank" rel="noopener">
                            ポートフォリオを見る
                            </a>
                        </p>
                        <?php endif; ?>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>口コミはまだ投稿されていません。</p>';
                endif;
                
            ?>
        </div>

        <div>
            <div>
                <h2>受講までの流れ</h2>
                <span></span>
            </div>
            <div>
                <div>
                    <div>
                        <p>1</p>
                        <p>お申し込みとその後</p>
                    </div>
                    <span></span>
                    <p>当サイトよりお申し込み後、zoom面談の日程を確認いたします。</p>
                </div>

                <div>
                    <div>
                        <p>2</p>
                        <p>最初の面談</p>
                    </div>
                    <span></span>
                    <p>お申し込み後の面談では現在のスキル感や悩み事などを確認します。</p>
                    <p>
                        加入の意思が確認できましたらどのコースから始めるのかを確認します。
                    </p>
                    <p>LINEグループを作成します</p>
                </div>
                <div>
                    <div>
                        <p>3</p>
                        <p>お支払い</p>
                    </div>
                    <span></span>
                    <p>お支払いはPayPayまたは銀行振込です。</p>
                    <p>
                        お支払いの確認が取れましたらzoomの日程を決め受講スタートとなります。
                    </p>
                </div>

            </div>


        </div>

        <div class="btn">
            <a href="">個別相談に申し込む／お問い合わせ</a>

        </div>

        <div>
            <div>
                <h2>Q&A</h2>
                <span></span>
            </div>
            <div>
                <p>Q1,学習習慣がなくても大丈夫ですか？</p>
                <span></span>
                <p>問題ありません！</p>
                <p>ProProでは、学習のスケジュールを立てさせていただきスケジュール通りにできているのかを講師より確認させていただき、遅れている際にはスケジュールの見直しと催促をさせていただきます。</p>
            </div>
            <div>
                <p>Q1,全く勉強していなくても加入は可能ですか？</p>
                <span></span>
                <p>問題ありません！</p>
                <p>やる気さえあれば歓迎いたします！</p>
            </div>

        </div>









    </div>

</main>

<?php get_footer(); ?>