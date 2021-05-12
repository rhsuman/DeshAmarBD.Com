<?php echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?>
<rss version="2.0"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:admin="http://webns.net/mvcb/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">

    <channel>
        <title><?php echo xml_convert($feed_name); ?></title>
        <link><?php echo $feed_url; ?></link>
        <description><?= xml_convert($settings['site_description']); ?></description>
        <dc:language><?php echo $page_language; ?></dc:language>
        <dc:creator><?php echo $creator_email; ?></dc:creator>
        <dc:rights>Copyright <?= xml_convert($settings['copyright']); ?></dc:rights>

        <?php foreach ($posts as $post): ?>
            <item>
                <title><?php echo xml_convert($post->title); ?></title>
                <link><?php echo site_url('site/view/' . $post->title_slug) ?></link>
                <guid><?php echo site_url('site/view/' . $post->title_slug) ?></guid>
                <description><![CDATA[ <?php echo character_limiter($post->content, 200); ?>></description>
                <enclosure url="<?php echo site_url('' . $post->image) ?>" type="image/jpeg"/ alt="<?php echo xml_convert($post->title); ?>">
                    <pubDate><?php echo $post->created_at; ?></pubDate>
                    <dc:creator><?php
                        $author = get_user($post->user_id);
                        if (!empty($author)):
                            ?>
                            <?php echo html_escape($author->username); ?>
                        <?php endif; ?></dc:creator>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>