<?php

namespace App\Http\Helpers\Bracket;

class Visualizer
{
    public $Settings = array();
    public $TeamList;
    public $Type;

    private $Brackets = array();
    private $AvailableTeams;
    private $AvailableRounds;
    private $SpacingMultiplier = 0.4;
    private $PlayerWrapperHeight = 30;
    private $MatchContainerWidth = 160;
    private $RoundSpacing = 40;
    private $MatchSpacing = 40;

    ///<Summary>
    ///Default constructor for visualizer
    ///<Summary>
    public function __construct($team_list, $settings, $team_count)
    {
        $this->TeamList = $team_list;
        $this->Settings = $settings;
        $this->TeamImage = isset($this->Settings['image']) ? $this->Settings['image'] : true;
        $this->ShowThirdPlace = isset($this->Settings['bronze']) ? $this->Settings['bronze'] : true;
        $this->ThirdMatchInList = isset($this->Settings['nobronze']) ? $this->Settings['nobronze'] : true;
        $this->ETScore = isset($this->Settings['etscore']) ? $this->Settings['etscore'] : false;
        $this->PTScore = isset($this->Settings['ptscore']) ? $this->Settings['ptscore'] : false;
        $this->BorderCorrection = 2;
        $this->HeightMultiplier = 1;
        $this->BorderW = 0;
        $this->DefaultRoundNumber = 1;
        $this->MediaFolder = './assets/flags/svg/';
        $this->DefaultTeamNumber = $team_count;
        $this->Teams();
        $this->CalculateBrackets();
    }

    private function Teams()
    {
        $mapTeamsData = array_map(function ($t) {
            return $t['name'];
        }, $this->TeamList);

        $countValues = (array_count_values($mapTeamsData));
        // $this->DefaultTeamNumber = count($countValues);

        return $this->DefaultTeamNumber;
    }

    ///<Summary>
    ///Calculate brackets for rendering data
    ///<Summary>
    private function CalculateBrackets()
    {
        if ($this->TeamList != '') {
            $getTeams = $this->TeamList;
            if ($this->DefaultTeamNumber == 1) {
                $getTeams[] = 'TBD';
            }

            if ($this->DefaultTeamNumber == 4) {
                $this->AvailableTeams = $this->DefaultTeamNumber;
            } else {
                $this->AvailableTeams = $this->DefaultTeamNumber;
                // $this->AvailableTeams = $this->DefaultTeamNumber - 1;
            }

            $getTeams = range(1, $this->AvailableTeams);
        }

        // dd($this->AvailableTeams);

        $clculateLog = ceil(log($this->AvailableTeams) / log(2));
        $firstRounds = pow(2, $clculateLog);
        $this->AvailableRounds = log($firstRounds, 2);
        $checkToAdd = $firstRounds - $this->AvailableTeams;

        for ($i = 0; $i < $checkToAdd; $i++) {
            $getTeams[] = null;
        }

        $CalculateTo = log($this->AvailableRounds / 2, 2);

        for ($i = 0; $i < $CalculateTo; $i++) {
            $OutputTeams = array();
            foreach ($getTeams as $player) {
                $CalcSplice = pow(2, $i);
                $Home = array_splice($getTeams, 0, $CalcSplice);
                $Away = array_splice($getTeams,   -$CalcSplice);

                $OutputTeams = array_merge($OutputTeams, $Home);
                $OutputTeams = array_merge($OutputTeams, $Away);
            }
            $getTeams = $OutputTeams;
        }

        // dd($getTeams);

        $Matches = array_chunk($getTeams, 2);


        if ($this->AvailableTeams > 2) {
            foreach ($Matches as $key => &$match) {
                $MatchNumber = $key + 1;
                if ($match[0] && $match[1]) {
                    $this->Brackets[$this->DefaultRoundNumber][$MatchNumber] = $match;
                    $match = null;
                } else {
                    $match = $match[0] ? $match[0] : $match[1];
                }
            }
            $Matches = array_chunk($Matches, 2);
        }

        if (count($this->Brackets)) $this->DefaultRoundNumber++;

        //Create the first full round of teams, some may be blank if waiting on the results of a previous round
        for ($i = 0; $i < count($Matches); $i++) {
            $this->Brackets[$this->DefaultRoundNumber][$i + 1] = $Matches[$i];
        }

        //Create the result of the empty rows for this tournament
        for ($this->DefaultRoundNumber += 1; $this->DefaultRoundNumber <= $this->AvailableRounds; $this->DefaultRoundNumber++) {
            for ($matchNumber = 1; $matchNumber <= ($firstRounds / pow(2, $this->DefaultRoundNumber)); $matchNumber++) {
                $this->Brackets[$this->DefaultRoundNumber][$matchNumber] = array(null, null);
            }
        }

        $this->CalculatePositions();
    }

    ///<Summary>
    ///Calculate brackets positions
    ///<Summary>
    private function CalculatePositions()
    {
        $multiplier = 0;

        foreach ($this->Brackets as $roundNumber => &$round) {
            foreach ($round as $matchNumber => &$match) {
                //Give teams a nicer index
                $match['TeamHome'] = $match[0];
                $match['TeamAway'] = $match[1];

                unset($match[0]);
                unset($match[1]);

                //Figure out the bracket positions
                $match['ContainerTop'] = (((2 * $matchNumber) - 1) * (pow(2, ($roundNumber) - 1)) - 1) * (($this->MatchSpacing / 2) + $this->PlayerWrapperHeight);
                $match['ContainerLeft'] = ($roundNumber - 1) * ($this->MatchContainerWidth + $this->RoundSpacing - 1);
                $match['vConnectorLeft'] = floor($match['ContainerLeft'] + $this->MatchContainerWidth + ($this->RoundSpacing / 2) - ($this->BorderW / 2));
                $match['vConnectorHeight'] = ($this->SpacingMultiplier * $this->MatchSpacing) + ($this->HeightMultiplier * $this->PlayerWrapperHeight) + $this->BorderW;
                $match['vConnectorTop'] = $match['hConnectorTop'] = $match['ContainerTop'] + $this->PlayerWrapperHeight;
                $match['hConnectorLeft'] = ($match['vConnectorLeft'] - ($this->RoundSpacing / 2)) + 2;
                $match['hConnector2Left'] = $match['ContainerLeft'] + $this->MatchContainerWidth + ($this->RoundSpacing / 2);

                //Adjust the positions depending on the match number
                if (!($matchNumber % 2)) {
                    $match['hConnector2Top'] = $match['vConnectorTop'] -= ($match['vConnectorHeight'] - $this->BorderW);
                } else {
                    $match['hConnector2Top'] = $match['vConnectorTop'] + ($match['vConnectorHeight'] - $this->BorderW);
                }
            }

            $multiplier++;
            //Update the spacing variables
            $this->SpacingMultiplier *= 2;
            $this->HeightMultiplier *= 2;
        }
    }

    ///<Summary>
    ///Calculate winners etc.
    ///</Summary>
    public function ReBuildDataFromArray()
    {
        $modifieArray = array();

        for ($i = 0; $i < count($this->TeamList); $i += 2) {
            $home = $this->TeamList[$i];
            $away = $this->TeamList[$i + 1];

            if ($home['score'] > $away['score'] || (isset($away['et_score']) && $home['et_score'] > $away['et_score']) || (isset($home['pt_score']) && $home['pt_score'] > $away['pt_score'])) {
                $this->TeamList[$i]['winner'] = 1;
                $this->TeamList[$i + 1]['winner'] = 0;
            } else {
                $this->TeamList[$i]['winner'] = 0;
                $this->TeamList[$i + 1]['winner'] = 1;
            }

            if (isset($home['et_score']) && isset($away['et_score'])) {
                if ($home['et_score'] != null || $away['et_score'] != null) {
                    $this->TeamList[$i]['show_extra'] = 1;
                    $this->TeamList[$i + 1]['show_extra'] = 1;
                }
            }

            if (isset($home['pt_score']) && isset($away['pt_score'])) {
                if ($home['pt_score'] != null || $away['pt_score'] != null) {
                    $this->TeamList[$i]['show_penalty'] = 1;
                    $this->TeamList[$i + 1]['show_penalty'] = 1;
                }
            }

            array_push($modifieArray, $this->TeamList[$i]);
            array_push($modifieArray, $this->TeamList[$i + 1]);
        }

        return $modifieArray;
    }

    ///<Summary>
    ///Create and render data from array
    ///</Summary>
    public function RenderFromData()
    {
        $html = $this->PrintRoundTitles();
        // $this->TeamList = $this->ReBuildDataFromArray();

        // if ($this->ShowThirdPlace || $this->ThirdMatchInList) {
        //     $this->thirdPlaceMatch = $this->TeamList;
        //     $third_place_team_1 = count($this->thirdPlaceMatch) - 4;
        //     $third_place_team_2 = count($this->thirdPlaceMatch) - 3;

        //     unset($this->TeamList[$third_place_team_1]);
        //     unset($this->TeamList[$third_place_team_2]);
        //     $this->TeamList = array_values($this->TeamList);
        // }

        //Add html elements to render
        $html .= '<div id="brackets-container">';
        $data = 0;
        $multiplier = 0;

        // dd($this->Brackets);

        foreach ($this->Brackets as $roundNumber => $round) {
            foreach ($round as $matchNumber => $match) {
                //Match Container Positions
                $containerTop = $match['ContainerTop'];
                $containerLeft = $match['ContainerLeft'];
                $containerWidth = $this->MatchContainerWidth;

                $vConnectTop = $match['vConnectorTop'];
                $vConnectLeft = $match['vConnectorLeft'];
                $vConnectHeight = $match['vConnectorHeight'];

                $class_home = '';
                $class_away = '';

                // if ($this->TeamList[$data]['winner'] == 1) {
                //     $class_home = '';
                //     $class_away = '';
                // } else if ($this->TeamList[$data + 1]['winner'] == 1) {
                //     $class_away = '';
                //     $class_home = '';
                // } else if ($this->TeamList[$data + 1]['winner'] == 0 && $this->TeamList[$data]['winner'] == 0) {
                //     $class_away = '';
                //     $class_home = '';
                // } else {
                //     $class_home = '';
                //     $class_away = '';
                // }

                $et_score_home = '';
                $et_score_away = '';
                $pt_score_home = '';
                $pt_score_away = '';


                if (isset($this->TeamList[$data]['show_extra']) && $this->TeamList[$data + 1]['show_extra']) {
                    if ($this->TeamList[$data]['show_extra'] == 1 && $this->TeamList[$data + 1]['show_extra'] == 1) {
                        $et_score_home = ' (' . $this->TeamList[$data]['et_score'] . ')';
                        $et_score_away = ' (' . $this->TeamList[$data + 1]['et_score'] . ')';
                    }
                }

                if (isset($this->TeamList[$data]['show_penalty']) && $this->TeamList[$data + 1]['show_penalty']) {
                    if ($this->TeamList[$data]['show_penalty'] == 1 && $this->TeamList[$data + 1]['show_penalty'] == 1) {
                        $pt_score_home = ' (' . $this->TeamList[$data]['pt_score'] . ')';
                        $pt_score_away = ' (' . $this->TeamList[$data + 1]['pt_score'] . ')';
                    }
                }

                $gridClass = "";

                if ($this->TeamImage) {
                    $gridClass = "grid-3";
                }

                $html .= '<div class="match-container" style="top: ' . $containerTop . 'px; left: ' . $containerLeft . 'px; width: ' . $containerWidth . 'px;">';
                //$html.='<div class="third-place-match-header">3-rd place</div>';
                $html .= '<div class="match-body">';
                $html .= '<div class="team-container ' . $class_home . ' ' . $gridClass . '">';

                //If true we show image or flag for home team
                if ($this->TeamImage) {
                    $html .= '<div class="team-image">';
                    $html .= '<img src="' . $this->MediaFolder . strtolower($this->slugify($this->TeamList[$data]['name'])) . '.svg">';
                    $html .= '</div>';
                }

                $html .= '<div class="team-name">' . $this->TeamList[$data]['name'] . '</div>';
                $html .= '<div class="team-score">' . $this->TeamList[$data]['score'] . '</div>';
                $html .= '</div>';
                $html .= '<div class="match-divider"></div>';
                $html .= '<div class="team-container ' . $class_away . ' ' . $gridClass . '">';

                //If true we show image or flag for away team
                if ($this->TeamImage) {
                    $html .= '<div class="team-image">';
                    $html .= '<img src="' . $this->MediaFolder . strtolower($this->slugify($this->TeamList[$data + 1]['name'])) . '.svg">';
                    $html .= ' </div>';
                }

                $html .= '<div class="team-name">' . $this->TeamList[$data + 1]['name'] . '</div>';
                $html .= '<div class="team-score">' . $this->TeamList[$data + 1]['score'] . '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';

                $hCTop = $match['hConnectorTop'];
                $h2Top = $match['hConnector2Top'];

                //Calculate correction
                $this->Correction = (($roundNumber * $multiplier) * $this->BorderCorrection);
                $hCTop = $match['hConnectorTop'];

                //Correct connection lines
                if (!($matchNumber % 2)) {
                    $h2Top = $match['hConnector2Top'] - $this->Correction;
                    $vConnectTop = $vConnectTop - $this->Correction;
                } else {
                    $h2Top = $match['hConnector2Top'] + $this->Correction;
                }

                $vConnectHeight = $vConnectHeight + $this->Correction;

                if ($roundNumber != $this->AvailableRounds) {
                    $html .= '<div class="v-connector" style="top: ' . $vConnectTop . 'px; left: ' . $vConnectLeft . 'px; height: ' . $vConnectHeight . 'px;"></div>';
                    $html .= '<div class="h-connector" style="top: ' . $hCTop . 'px; left: ' . $match['hConnectorLeft'] . 'px;"></div>';
                    $html .= '<div class="h-connector h-connector-bottom" style="top: ' . $h2Top . 'px; left: ' . $match['hConnector2Left'] . 'px;"></div>';
                }

                $data += 2;
            }

            $multiplier++;
        }

        // if ($this->ShowThirdPlace) {
        //     if ($this->thirdPlaceMatch[$third_place_team_1]['et_score'] !== NULL || $this->thirdPlaceMatch[$third_place_team_2]['et_score'] !== NULL) {
        //         $et_score_home = ' (' . $this->thirdPlaceMatch[$third_place_team_1]['et_score'] . ')';
        //         $et_score_away = ' (' . $this->thirdPlaceMatch[$third_place_team_2]['et_score'] . ')';
        //     } else {
        //         $et_score_home = '';
        //         $et_score_away = '';
        //     }

        //     if ($this->thirdPlaceMatch[$third_place_team_1]['winner'] == 1) {
        //         $class_home = 'win';
        //         $class_away = 'loss';
        //     } else if ($this->thirdPlaceMatch[$third_place_team_2]['winner'] == 1) {
        //         $class_away = 'win';
        //         $class_home = 'loss';
        //     } else if ($this->thirdPlaceMatch[$third_place_team_2]['winner'] == 0 && $this->thirdPlaceMatch[$third_place_team_1]['winner'] == 0) {
        //         $class_away = 'draw';
        //         $class_home = 'draw';
        //     } else {
        //         $class_home = '';
        //         $class_away = '';
        //     }

        //     $containerLeft = $containerLeft / 1.5;
        //     $containerTop = $containerTop - 26;
        //     $html .= '<div class="match-container match-for-third-place" style="top: ' . $containerTop . 'px; left: ' . $containerLeft . 'px; width: ' . $containerWidth . 'px;">';
        //     $html .= '<div class="third-place-match-header">3-rd place</div>';
        //     $html .= '<div class="match-body">';
        //     $html .= '<div class="team-container ' . $class_home . ' ' . $gridClass . '">';
        //     //If true we show image or flag for home team
        //     if ($this->TeamImage) {
        //         $html .= '<div class="team-image"><img src="./assets/flags/svg/' . strtolower($this->slugify($this->thirdPlaceMatch[$third_place_team_1]['name'])) . '.svg"></div>';
        //     }
        //     $html .= '<div class="team-name">' . $this->thirdPlaceMatch[$third_place_team_1]['name'] . '</div>';
        //     $html .= '<div class="team-score">' . $this->thirdPlaceMatch[$third_place_team_1]['score'] . $et_score_home . '</div>';
        //     $html .= '</div>';
        //     $html .= '<div class="match-divider"></div>';
        //     $html .= '<div class="team-container ' . $class_away . ' ' . $gridClass . '">';
        //     //If true we show image or flag for away team
        //     if ($this->TeamImage) {
        //         $html .= '<div class="team-image"><img src="./assets/flags/svg/' . strtolower($this->slugify($this->thirdPlaceMatch[$third_place_team_2]['name'])) . '.svg"></div>';
        //     }
        //     $html .= '<div class="team-name">' . $this->thirdPlaceMatch[$third_place_team_2]['name'] . '</div>';
        //     $html .= '<div class="team-score">' . $this->thirdPlaceMatch[$third_place_team_2]['score'] . $et_score_away . '</div>';
        //     $html .= '</div>';
        //     $html .= '</div>';
        //     $html .= '</div>';
        //     $html .= '</div>';
        // }

        return $html;
    }

    ///<Summary>
    ///Render all round titles top of the tournament
    ///</Summary>
    private function PrintRoundTitles()
    {
        if ($this->AvailableTeams == 2) {
            //Final
            $roundTitles = array('Final');
        } elseif ($this->AvailableTeams <= 4) {
            //Semi-Finals Final
            $roundTitles = array('Semi-Finals', 'Final');
        } elseif ($this->AvailableTeams <= 8) {
            //Quarter-Finals Semi-Finals Final
            $roundTitles = array('Quarter-Finals', 'Semi-Finals', 'Final');
        } else {
            //Quarter-Finals Semi-Finals Final and all others
            $roundTitles = array('Quarter-Finals', 'Semi-Finals', 'Final');
            $noRounds = ceil(log($this->AvailableTeams, 2));
            $noTeamsInFirstRound = pow(2, ceil(log($this->AvailableTeams) / log(2)));
            $tempRounds = array();

            //Last 3 rounds is ignored, semi final and quarter final rounds
            for ($i = 0; $i < $noRounds - 3; $i++) {
                $tempRounds[] = 'Qualifications';
                $noTeamsInFirstRound /= 2;
            }

            //Merge titles
            $roundTitles = array_merge($tempRounds, $roundTitles);
        }

        $html = '<div id="match-titles-container">';

        foreach ($roundTitles as $key => $roundTitle) {
            $left = $key * ($this->MatchContainerWidth + $this->RoundSpacing - 1);
            $html .= '<div class="match-title" style="left: ' . $left . 'px; width: ' . $this->MatchContainerWidth . 'px;">' . $roundTitle . '</div>';
        }

        $html .= '</div>';

        return $html;
    }

    ///<Summary>
    ///Slugify string
    ///<Summary>
    public static function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
