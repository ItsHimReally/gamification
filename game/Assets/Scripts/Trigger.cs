using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Trigger : MonoBehaviour
{
    [SerializeField] private CubeMovement movingCube;
    [SerializeField] private Vector3 direct;
    [SerializeField] private GameObject hitParticles;

    private void OnTriggerStay(Collider other)
    {
        GameObject currentObject = other.gameObject;

        if(movingCube.tag == "Player")
        {
            /*Debug.Log(other.gameObject.name);
            Debug.Log(movingCube.IsMoving);
            Debug.Log(movingCube.CurrentDirection);s*/
        }

        if (movingCube.CurrentDirection == direct)
        {
            if (currentObject.tag == "static")
            {
                movingCube.StopMovement();
            }
            if (currentObject.GetComponent<CubeMovement>())
            {
                CubeMovement cube = currentObject.GetComponent<CubeMovement>();
                if (cube != movingCube && !cube.IsMoving)
                {
                    movingCube.StopMovement();
                }
            }
        }
    }

    private void OnTriggerEnter(Collider other)
    {
        GameObject currentObject = other.gameObject;

        if(movingCube.CurrentDirection == direct)
        {
            if (currentObject.tag == "static")
            {
                AudioManager.instance.PlayOneShot(AudioManager.instance.GetSound("bonk"), SoundType.Effects);
                Instantiate(hitParticles, transform.position, Quaternion.identity);
            }
            if (currentObject.GetComponent<CubeMovement>())
            {
                CubeMovement cube = currentObject.GetComponent<CubeMovement>();
                if (cube != movingCube && !cube.IsMoving)
                {
                    AudioManager.instance.PlayOneShot(AudioManager.instance.GetSound("bonk"), SoundType.Effects);
                    Instantiate(hitParticles, transform.position, Quaternion.identity);
                }
            }
        }
    }
}
