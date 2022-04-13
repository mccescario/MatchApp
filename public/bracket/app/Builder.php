<?php
///<Summary>
///Builder class
///<Summary>
class Builder
{
    public $Brackets = array();
    public $Type;
    public $Names;
    private $AvailableTeams;
    private $AvailableRounds;
    private $DefaultTeamNumber = 8;
    private $DefaultRoundNumber = 1;
    private $SpacingMultiplier = 0.4;
    private $HeightMultiplier = 1;

    private $PlayerWrapperHeight = 31;
    private $MatchContainerWidth = 170;
    private $RoundSpacing = 40;
    private $MatchSpacing = 40;
    private $borderW = 0;

    ///<Summary>
    ///Default constructor for builder
    ///<Summary>
    public function __construct($names, $type)
    {
        $this->Names = $names;
        $this->Type = $type;
        $this->BorderCorrection = 2;
        $this->CalculateBrackets();
    }

    ///<Summary>
    ///Calculate brackets for rendering data
    ///<Summary>
    private function CalculateBrackets()
    {
        if ($this->Names != '') {
            $getTeams = array_filter($this->Names);

            if (count($getTeams) == 1) {
                $getTeams[] = 'TBD';
            }
            $this->AvailableTeams = count($getTeams);
        } else {
            $this->AvailableTeams = ((is_numeric($this->Teams)) && ($this->Teams > 1)) ? $this->Teams : $this->DefaultTeamNumber;
            $getTeams = range(1, $this->AvailableTeams);
        }
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

                if ($this->Type == 1) {
                    $OutputTeams = array_merge($OutputTeams, $Home);
                    $OutputTeams = array_merge($OutputTeams, $Away);
                } else if ($this->Type == 2) {
                    $OutputTeams = array_merge($OutputTeams, $Away);
                    $OutputTeams = array_merge($OutputTeams, $Home);
                } else {
                    $OutputTeams = array_merge($OutputTeams, $Home);
                    $OutputTeams = array_merge($OutputTeams, $Away);
                }
            }

            $getTeams = $OutputTeams;
        }

        if ($this->Type == 0) {
            $RandomizedTeams = array();
            $ShuffledTeams = array_filter($getTeams);
            shuffle($ShuffledTeams);

            foreach ($getTeams as $key => $team) {
                $RandomizedTeams[$key] = is_null($team) ? null : array_pop($ShuffledTeams);
            }

            $getTeams = $RandomizedTeams;
        }

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

        if (count($this->Brackets)) {
            $this->DefaultRoundNumber++;
        }

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
        foreach ($this->Brackets as $roundNumber => &$round) {
            foreach ($round as $matchNumber => &$match) {

                //New indices
                $match['TeamHome'] = $match[0];
                $match['TeamAway'] = $match[1];

                unset($match[0]);
                unset($match[1]);

                //Figure out the bracket positions
                $match['matchWrapperTop'] = (((2 * $matchNumber) - 1) * (pow(2, ($roundNumber) - 1)) - 1) * (($this->MatchSpacing / 2) + $this->PlayerWrapperHeight);
                $match['matchWrapperLeft'] = ($roundNumber - 1) * ($this->MatchContainerWidth + $this->RoundSpacing - 1);
                $match['vConnectorLeft'] = floor($match['matchWrapperLeft'] + $this->MatchContainerWidth + ($this->RoundSpacing / 2) - ($this->borderW / 2));
                $match['vConnectorHeight'] = ($this->SpacingMultiplier * $this->MatchSpacing) + ($this->HeightMultiplier * $this->PlayerWrapperHeight) + $this->borderW;
                $match['vConnectorTop'] = $match['hConnectorTop'] = $match['matchWrapperTop'] + $this->PlayerWrapperHeight;
                $match['hConnectorLeft'] = ($match['vConnectorLeft'] - ($this->RoundSpacing / 2)) + 2;
                $match['hConnector2Left'] = $match['matchWrapperLeft'] + $this->MatchContainerWidth + ($this->RoundSpacing / 2);

                //Adjust the positions depending on the match number
                if (!($matchNumber % 2)) {
                    $match['hConnector2Top'] = $match['vConnectorTop'] -= ($match['vConnectorHeight'] - $this->borderW);
                } else {
                    $match['hConnector2Top'] = $match['vConnectorTop'] + ($match['vConnectorHeight'] - $this->borderW);
                }
            }

            //Update the spacing variables
            $this->SpacingMultiplier *= 2;
            $this->HeightMultiplier *= 2;
        }
    }

    ///<Summary>
    ///Render all brackets
    ///<Summary>
    public function RenderBrackets()
    {
        $html = $this->PrintRoundTitles();
        //Add html elements to render
        $html .= '<div id="brackets-container">';
        $multiplier = 0;
        $num = 1;
        foreach ($this->Brackets as $roundNumber => $round) {
            foreach ($round as $matchNumber => $match) {
                //Positions
                $wrappTop = $match['matchWrapperTop'];
                $wrappLeft = $match['matchWrapperLeft'];
                $wrappWidth = $this->MatchContainerWidth;
                $vConnectTop = $match['vConnectorTop'];
                $vConnectLeft = $match['vConnectorLeft'];
                $vConnectHeight = $match['vConnectorHeight'];

                $html .= '<div class="match-container" style="top: ' . $wrappTop . 'px; left: ' . $wrappLeft . 'px; width: ' . $wrappWidth . 'px;">';

                $html .= '<div class="match-body">';
                $html .= '<div class="team-home-container">';
                $html .= $this->TeamDropdown($match['TeamHome']) . '<input type="text" class="score" team="home" data-team="' . $match['TeamHome'] . '" match-number="' . $num . '">';
                $html .= '</div>';
                $html .= '<div class="match-divider"></div>';
                $html .= '<div class="team-away-container">';
                $html .= $this->TeamDropdown($match['TeamAway']) . '<input type="text" class="score" team="away" data-team="' . $match['TeamAway'] . '" match-number="' . $num . '">';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';

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
                $num++;
            }

            $multiplier++;
        }
        $html .= '</div>';

        return $html;
    }

    ///<Summary>
    ///Render all round titles top of the tournament
    ///</Summary>
    private function PrintRoundTitles()
    {
        if ($this->AvailableTeams == '') {
            $roundTitles = array();
        } elseif ($this->AvailableTeams == 2) {
            $roundTitles = array('Final');
        } elseif ($this->AvailableTeams <= 4) {
            $roundTitles = array('Semi-Finals', 'Final');
        } elseif ($this->AvailableTeams <= 8) {
            $roundTitles = array('Quarter-Finals', 'Semi-Finals', 'Final');
        } else {
            $roundTitles = array('Quarter-Finals', 'Semi-Finals', 'Final');
            $noRounds = ceil(log($this->AvailableTeams, 2));
            $noTeamsInFirstRound = pow(2, ceil(log($this->AvailableTeams) / log(2)));
            $tempRounds = array();

            //The minus 3 is to ignore the final, semi final and quarter final rounds
            for ($i = 0; $i < $noRounds - 3; $i++) {
                $tempRounds[] = 'Round of ' . $noTeamsInFirstRound;
                $noTeamsInFirstRound /= 2;
            }

            $roundTitles = array_merge($tempRounds, $roundTitles);
        }

        $html = '<div id="match-titles-container">';

        foreach ($roundTitles as $key => $roundTitle) {
            $left = $key * ($this->MatchContainerWidth + $this->RoundSpacing - 1);
            $html .= '<div class="match-title" match-key="' . $key . '" style="left: ' . $left . 'px; width: ' . $this->MatchContainerWidth . 'px;">' . $roundTitle . '</div>';
        }

        $html .= '</div>';

        return $html;
    }

    ///<Summary>
    ///DropDown HTML
    ///</Summary>
    private function TeamDropdown($selected)
    {
        $html = '<select class="team-select-dorpdown">';
        $html .= '<option' . ($selected == '' ? ' selected' : '') . '></option>';
        foreach (array_merge($this->Brackets[1], $this->Brackets[2]) as $bracket) {
            if ($bracket['TeamHome'] != '') {
                $html .= '<option value="' . $bracket['TeamHome'] . '" ' . ($selected == $bracket['TeamHome'] ? ' selected' : '') . '>' . $bracket['TeamHome'] . '</option>';
            }
            if ($bracket['TeamAway'] != '') {
                $html .= '<option value="' . $bracket['TeamAway'] . '" ' . ($selected == $bracket['TeamAway'] ? ' selected' : '') . '>' . $bracket['TeamAway'] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }
}
