<?php
    ini_set('max_execution_time', 0);
    require "dom/simple_html_dom.php";
    $funds = ['/funds/abcp11','/funds/afcr11','/funds/afof11','/funds/aiec11','/funds/almi11','/funds/alzr11','/funds/ancr11b','/funds/aqll11','/funds/arct11','/funds/arfi11b','/funds/arri11','/funds/atcr11','/funds/atsa11','/funds/bari11','/funds/bbfi11b','/funds/bbfo11','/funds/bbpo11','/funds/bbrc11','/funds/bbvj11','/funds/bcff11','/funds/bcia11','/funds/bcri11','/funds/bicr11','/funds/blcp11','/funds/blmo11','/funds/blmr11','/funds/bmii11','/funds/bmlc11','/funds/bmlc11b','/funds/bnfs11','/funds/bpff11','/funds/bpml11','/funds/brco11','/funds/brcr11','/funds/brev11','/funds/brht11b','/funds/brip11','/funds/brla11','/funds/btcr11','/funds/btgm11','/funds/btlg11','/funds/bvar11','/funds/bzli11','/funds/care11','/funds/cbop11','/funds/ceoc11','/funds/cjct11','/funds/cnes11','/funds/cpff11','/funds/cpts11','/funds/crff11','/funds/ctxt11','/funds/cvbi11','/funds/cxce11b','/funds/cxri11','/funds/cxtl11','/funds/deva11','/funds/dmac11','/funds/domc11','/funds/dovl11b','/funds/drit11b','/funds/edfo11b','/funds/edga11','/funds/egyr11','/funds/eldo11b','/funds/ercr11','/funds/euro11','/funds/faed11','/funds/famb11b','/funds/fatn11','/funds/fcas11','/funds/fcfl11','/funds/fexc11','/funds/ffci11','/funds/figs11','/funds/fiib11','/funds/fiip11b','/funds/finf11','/funds/fivn11','/funds/flma11','/funds/flrp11','/funds/fmof11','/funds/foft11','/funds/fpab11','/funds/fpng11','/funds/fvbi11','/funds/fvpq11','/funds/galg11','/funds/gcff11','/funds/ggrc11','/funds/grlv11','/funds/gsfi11','/funds/gtwr11','/funds/habt11','/funds/hbrh11','/funds/hbtt11','/funds/hcri11','/funds/hcst11','/funds/hctr11','/funds/hfof11','/funds/hgbs11','/funds/hgcr11','/funds/hgff11','/funds/hglg11','/funds/hgpo11','/funds/hgre11','/funds/hgru11','/funds/hlog11','/funds/hmoc11','/funds/hosi11','/funds/hpdp11','/funds/hrdf11','/funds/hrec11','/funds/hsaf11','/funds/hslg11','/funds/hsml11','/funds/hsre11','/funds/htmx11','/funds/husc11','/funds/ibff11','/funds/ifid11','/funds/ifie11','/funds/irdm11','/funds/jfll11','/funds/jppa11','/funds/jrdm11','/funds/jsre11','/funds/keve11','/funds/kfof11','/funds/kinp11','/funds/kisu11','/funds/kncr11','/funds/knhy11','/funds/knip11','/funds/knre11','/funds/knri11','/funds/knsc11','/funds/lasc11','/funds/lgcp11','/funds/lugg11','/funds/lvbi11','/funds/mall11','/funds/maxr11','/funds/mbrf11','/funds/mcci11','/funds/mfai11','/funds/mfii11','/funds/mgcr11','/funds/mgff11','/funds/mght11','/funds/more11','/funds/mxrf11','/funds/nchb11','/funds/newl11','/funds/newu11','/funds/nslu11','/funds/nvho11','/funds/nvif11b','/funds/onef11','/funds/orpd11','/funds/oucy11','/funds/ouff11','/funds/oujp11','/funds/oulg11','/funds/paby11','/funds/patc11','/funds/patl11','/funds/plcr11','/funds/plri11','/funds/pord11','/funds/pqag11','/funds/pqdp11','/funds/prsv11','/funds/prts11','/funds/pvbi11','/funds/qagr11','/funds/qmff11','/funds/rbbv11','/funds/rbcb11','/funds/rbco11','/funds/rbds11','/funds/rbed11','/funds/rbff11','/funds/rbgs11','/funds/rbir11','/funds/rbiv11','/funds/rbrd11','/funds/rbrf11','/funds/rbrl11','/funds/rbrp11','/funds/rbrr11','/funds/rbrs11','/funds/rbry11','/funds/rbts11','/funds/rbva11','/funds/rbvo11','/funds/rcfa11','/funds/rcrb11','/funds/rdes11','/funds/rdpd11','/funds/rech11','/funds/recr11','/funds/rect11','/funds/relg11','/funds/rfof11','/funds/rndp11','/funds/rngo11','/funds/rspd11','/funds/rvbi11','/funds/rzak11','/funds/rztr11','/funds/saag11','/funds/sadi11','/funds/saic11b','/funds/sare11','/funds/scpf11','/funds/sdil11','/funds/sdip11','/funds/sfnd11','/funds/shdp11b','/funds/shop11','/funds/shph11','/funds/sptw11','/funds/spvj11','/funds/strx11','/funds/tbof11','/funds/tepp11','/funds/tgar11','/funds/thra11','/funds/tord11','/funds/trnt11','/funds/trxf11','/funds/trxl11','/funds/ubsr11','/funds/urpr11','/funds/vcjr11','/funds/vere11','/funds/vgip11','/funds/vgir11','/funds/vifi11','/funds/vilg11','/funds/vino11','/funds/visc11','/funds/vlol11','/funds/vots11','/funds/vpsi11','/funds/vrta11','/funds/vsho11','/funds/vtlt11','/funds/vvpr11','/funds/wplz11','/funds/wtsp11b','/funds/xpci11','/funds/xpcm11','/funds/xpht11','/funds/xpin11','/funds/xplg11','/funds/xpml11','/funds/xppr11','/funds/xpsf11','/funds/xted11','/funds/ychy11'];
    // $funds = ['/funds/abcp11'];

    $handle = fopen('funds.csv', 'a');

    fwrite($handle, 'fundo;dividend yield;valor patrimonial;p/vp');

    foreach($funds as $fund){
        $url = "https://www.fundsexplorer.com.br$fund";
        $content = file_get_html($url, false);
        
        $indicators = array();
        if(!empty($content)) {
            $i = 0;
            foreach($content->find(".carousel-cell") as $divClass) {

                foreach($divClass->find(".indicator-title") as $title )
                    $indicators[$i]['title'] = $title->plaintext;
                
                foreach($divClass->find(".indicator-value") as $value )
                    $indicators[$i]['value'] = trim($value->plaintext);
                
                $i++;
            }
        }
        $fundname = explode('/', $fund);
        fwrite($handle, $fundname[2].";".$indicators[2]['value'].";".$indicators[4]['value'].";".$indicators[6]['value']."\n");
    }

    fclose($handle);
?>
<!-- <table>
    <thead>
        <tr>
            <th>Fundo</th>
            <th>Dividend Yield</th>
            <th>Valor patrimonial</th>
            <th>P/VP</th>
        </tr> 
    </thead>
    <tbody>

    <?php
    

    ?>
    </tbody>
    </table>
 -->
