<?php namespace App\Helpers;

//Facades
use DB;

class Helper
{

  public static function test()
  {
    return 'test';
  }

  public function insertar_camiones($desde,$hasta)
  {
    DB::connection('oracle')->statement("
    INSERT INTO TB_TARA 
    SELECT
    S1.TRUCKER,
    S1.TRK_IN_DATE,
    S1.TRK_OUT_DATE,
    S1.TRUCK_LIC,
    S1.DISPATCH_MODE,
    S1.TOTAL_WGT,
    P1.ENG_LNM,
    P1.PTNR_TYPE,
    S1.TOTAL_WGT2
    FROM
    (
        SELECT
            T1.TRUCKER,
            T1.TRUCK_LIC,
            T1.TRK_IN_DATE,
            T1.TRK_OUT_DATE,
            T1.CNTR_NO,
            DISPATCH_MODE,
            T1.TRK_IN_DATE - (5 / 1440),
            T1.TRK_IN_DATE + (5 / 1440),
            T1.TOTAL_WGT,
            T1.TOTAL_WGT2,
            (
                SELECT
                    COUNT (*)
                FROM
                    TB_TRUCK_IO T2
                WHERE
                    T2.TRUCK_LIC = T1.TRUCK_LIC
                AND T2.TRK_IN_DATE BETWEEN (T1.TRK_IN_DATE -(5 / 1440))
                AND (T1.TRK_IN_DATE +(5 / 1440))
            ) AS CUENTA
        FROM
            TB_TRUCK_IO T1
        WHERE
        T1.TRK_IN_DATE BETWEEN TO_DATE ('$desde','yyyy-mm-dd HH24:MI:SS')
        AND TO_DATE ('$hasta','yyyy-mm-dd HH24:MI:SS')
    ) S1,
    TB_PTNR P1
    WHERE
        S1.CUENTA = 1
    AND S1.TRUCK_LIC = P1.ZIP_CD
    AND P1.PTNR_TYPE = 'TRK'
    ORDER BY
        TRK_IN_DATE,
        TRUCK_LIC");    
    }

}