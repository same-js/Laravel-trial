<?php

namespace App\Libs;
class Common
{
  private $digit     = 0;
  private $maxLength = 0;

  /**
   * calcPercentageで使用する「文字列の長さ」と「四捨五入の小数点以下桁数」を設定する
   */
  public function setParameterForCalc($maxLength, $digit) {
    $this->digit = $digit;
    $this->maxLength = $maxLength;
  }
  /**
   * 入力された文字数が、文字列全体に占める割合を計算する
   * setParameterForCalcを先に呼び出すことを前提とする
   */
  public function calcPercentage($length) {
    if ($this->digit === 0 || $this->maxLength === 0) {
      // 実務（本番想定）であれば例外スローを記載する
      return 0;
    }
    return round($length / $this->maxLength*100, $this->digit);
  }
}
