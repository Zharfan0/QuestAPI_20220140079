package com.example.questapi_20220140079.viewmodel

import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.setValue
import androidx.lifecycle.SavedStateHandle
import androidx.lifecycle.ViewModel

class EditViewModel(savedStateHandle: SavedStateHandle,private val repositoryDataSiswa: RepositoryDataSiswa): ViewModel() {
    var uiStateSiswa by mutableStateOf(UIStateSiswa())
        private set