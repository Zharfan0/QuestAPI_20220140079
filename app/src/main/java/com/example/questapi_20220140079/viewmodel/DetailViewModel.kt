package com.example.questapi_20220140079.viewmodel

import android.annotation.SuppressLint
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.setValue
import androidx.lifecycle.SavedStateHandle
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.example.questapi_20220140079.modeldata.DataSiswa
import com.example.questapi_20220140079.repositori.RepositoryDataSiswa
import com.example.questapi_20220140079.uicontroller.route.DestinasiDetail
import kotlinx.coroutines.launch
import retrofit2.HttpException
import retrofit2.Response
import java.io.IOException

sealed interface StatusUIDetail {
    data class Success(val satusiswa: DataSiswa) : StatusUIDetail
    object Error : StatusUIDetail
    object Loading : StatusUIDetail
}

class DetailViewModel(savedStateHandle: SavedStateHandle,private val repositoryDataSiswa: RepositoryDataSiswa):ViewModel() {

    private val idSiswa: Int = checkNotNull(savedStateHandle[DestinasiDetail.itemIdArg])
    var statusUIDetail: com.example.questapi_20220140079.viewmodel.StatusUIDetail by mutableStateOf(com.example.questapi_20220140079.viewmodel.StatusUIDetail.Loading)
        private set

    init {
        getSatuSiswa()
    }

    fun getSatuSiswa(){
        viewModelScope.launch {
            statusUIDetail = com.example.questapi_20220140079.viewmodel.StatusUIDetail.Loading
            statusUIDetail = try {
                com.example.questapi_20220140079.viewmodel.StatusUIDetail.Success(satusiswa = repositoryDataSiswa.getSatuSiswa(idSiswa))
            }
            catch (e: IOException){
                com.example.questapi_20220140079.viewmodel.StatusUIDetail.Error
            }
            catch (e: HttpException){
                com.example.questapi_20220140079.viewmodel.StatusUIDetail.Error
            }
        }
    }

    @SuppressLint("SuspiciousIndentation")
    suspend fun hapusSatuSiswa() {
        val resp: Response<Void> = repositoryDataSiswa.hapusSatuSiswa(idSiswa)

        if (resp.isSuccessful){
            println("Sukses Hapus Data : ${resp.message()}")
        }else{
            println("Gagal Hapus Data : ${resp.errorBody()}")
        }

    }
}