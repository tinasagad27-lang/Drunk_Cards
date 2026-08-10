<?php
class Dare_model extends CI_Model {
    public function get_random_dare() {
        // Tiktok-trending, classy conyo dares
        $dares = [
            "Do the 'What I ordered vs What I got' pose — dapat with matching facial expression!",
            "Say 'Hi guys, welcome to my GRWM' then pretend you're doing a makeup vlog.",
            "Give your best 'clean girl aesthetic' look — dapat parang influencer ka.",
            "Pretend you’re doing a 'Day in my life as a rich tita' vlog — go all out!",
            "Do the trending Tiktok dance of your choice — kahit chorus lang, go!",
            "Say a random sentence pero dapat in a 'corporate girly' tone — parang soft launch ng resignation mo.",
            "Do a fake product review — kunwari ikaw si Alodia or Heart Evangelista.",
            "Act like you’re in a podcast — say something super deep and vague like 'I realized na healing isn't linear, it’s circular.'",
            "Give your best fake laugh na parang nakakatawa kahit hindi naman.",
            "Say 'POV: you're the main character walking away from drama' and do a dramatic walkout."
        ];

        // Return a random dare
        return $dares[array_rand($dares)];
    }
}
