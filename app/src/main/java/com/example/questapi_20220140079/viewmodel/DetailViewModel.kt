package com.example.questapi_20220140079.viewmodel

import com.example.questapi_20220140079.modeldata.DataSiswa

sealed interface StatusUIDetail {
    data class Success(val satusiswa: DataSiswa) : StatusUIDetail
    object Error : StatusUIDetail
    object Loading : StatusUIDetail
}