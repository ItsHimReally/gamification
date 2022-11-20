using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

public class Level : MonoBehaviour
{
    [SerializeField] private TextMeshProUGUI levelLabel;
    private int levelId;

    private void Awake()
    {
        levelId = SceneManager.GetActiveScene().buildIndex + 1;

        levelLabel.text = levelId > 9 ? levelId.ToString() : "0" + levelId.ToString();
    }
}
