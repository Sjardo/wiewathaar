# wiewathaar

Hoi Caroline,

De opmaak is extreem basis, ook om te zorgen dat jullie het sneller kunnen opmaken. Ik zet even een Kopie/paste hier klaar. Als je de instructies volgt zou het direct moeten werken. Daarna kan je het natuurlijk indelen zoals je zelf wilt :)

---

Wat heb je nodig:
 - ACF Pro

Copy-past in Functions.php (of waar je je gutenburg blokken bouwd)

```
add_action('acf/init', 'wiewathaar_blocks');

function wiewathaar_blocks() {

    if( function_exists('acf_register_block_type') ) {
    
        acf_register_block_type(array( // Add new block
            'name'              => 'lookbook', // Name of block for code
            'title'             => __('Lookbook'), // font-end name in the Gutenberg Editor
            'render_template'   => 'template-parts/blocks/lookbook/lookbook.php', // Path to renderd template
            'icon'              => 'images-alt2', // Dashicon. Just to be nice.
            'keywords'          => array( 'lookbook', 'techkoningin'), // whatever you want
			'enqueue_assets' => function(){
      // CSS file. Only loads when the block is insterted
				wp_enqueue_style( 'block-lookbook', get_template_directory_uri() . '/template-parts/blocks/lookbook/lookbook.css' );
        
        // JS for the masonry grid. Sadly, CSS masonry is not yet supported
				wp_enqueue_script( 'block-masonry', get_template_directory_uri() . '/template-parts/blocks/lookbook/masonry.js', array('jquery'), '', true );
        
        // JS for the pop-up and filtering. 
				wp_enqueue_script( 'block-lookbook', get_template_directory_uri() . '/template-parts/blocks/lookbook/lookbook.js', array('jquery'), '', true );
				  },
        ));
    }
}
```

Tip: kopieer de directory `acf-json` naar je theme directory, inclusief mijn bestand. Dan heb je direct de ACF fields


#JS
Hier ben ik geen held in, maar dit werkt prima en is redelijk flexibel :)

#PHP
Ik ga jou natuurlijk niet vertellen hoe je PHP moet schrijven. dat kun je 100x beter dan ik :D
Er staan nu 3 loopjes in
1 - Categorieen voor de tags
2 - het grid voor Masonry layout
3 - Voor de popup.

Je kunt dit natuurlijk slim samenvoegen als je genoeg tijd hebt of netjes opdelen :)

#CSS
Alles is geprefixed, met BEM opgemaakt. kan je veilig bewerken. Ongeveer alles wat overbodig is, is er uit gehaald!
![Screenshot 2021-03-21 at 15 48 52](https://user-images.githubusercontent.com/6122172/111909295-02e3b080-8a5d-11eb-8b99-0a30dc79e384.png)

