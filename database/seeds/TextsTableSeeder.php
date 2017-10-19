<?php

use Illuminate\Database\Seeder;

class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('texts')->insert([
            'machine_name' => 'violeta_bio_short',
            'title' => 'About Violeta Skya Short',
            'body' => "<p>Violeta Skya is known for her talents as a songwriter, topliner and memorable 'hook' maker. As a lyricist she emphasises the power of feeling. A story behind lyrics is important for her and she puts a new message in every song.</p> <p>Emotional, often with a dark and edgy vibe, her songs and her versatile vocals leave audiences in the astonished state.</p>",
        ]);

        DB::table('texts')->insert([
            'machine_name' => 'violeta_bio_long',
            'title' => 'About Violeta Skya Long',
            'body' => "<p>Violeta Skya has proven yet again that not many artists have the persistence, drive, longevity and sheer sizzle that she does! Multi-lingual, with a diverse cultural background, the artist, born in Vilnius, Lithuania to Slavic parents, grew up surrounded by many different types of music. As a teenager, after years of music education, and training as a classical pianist, Violeta decided to become a full time musician and went to study pop and jazz vocals at Vilnius Conservatory. Many performance opportunities came along. At that time she performed a lot in various festivals and city concerts and started work as a session singer. Performing for large audiences at international contests in Europe, (winning several in Sweden, Spain and Latvia) enabled her to develop as an artist and stage performer. Concerts, jazz gigs and numerous function bookings have been her playground for an entire life.</p> <p>During her vocal journey she has successfully sung a wide range of musical styles from jazz to rock. Moving to London in 2014 to take her musical development to the next level. Recently she finished her second degree on the BMus at BIMM London. The new life in the UK helped to channel her artistic expression and Violeta has found her niche and original sound, uniquely combining pop with r'n'b and dance music, creating a sexy, smart and glamorous vibe.  Violeta is known for her talents as a songwriter, topliner and memorable 'hook' maker. As a lyricist she emphasises the power of feeling.   A story behind lyrics is important for her and she puts a new message in every song. Emotional, often with a dark and edgy vibe, her songs and her versatile vocals leave audiences in a jaw-dropped state. They frequently introduce her music to their friends and encourage other followers to engage with her career.</p> <p>At the moment Violeta is recording a lot of original material and is planning future releases. Her collaborations with established music producers, several of whom also work for record labels, have enabled her to network with management companies, which are now interested in her music.</p> <p>Violeta believes music is a universal language that can speak to everyone. She highly values human relations, originality, self-expression, diversity, positivity and ambition.</p>",
        ]);
    }
}
