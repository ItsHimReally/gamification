using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CubeMovement : MonoBehaviour
{
    [SerializeField] private float forceValue;
    [SerializeField] List<Vector3> directions;

    private Rigidbody rb;
    private bool isMoving = false;
    private Vector3 currentDirection;

    public  bool IsMoving
    {
        get { return isMoving; }
        private set { isMoving = value; }
    }

    public Vector3 CurrentDirection
    {
        get { return currentDirection; }
        private set { currentDirection = value; }
    }

    private void OnEnable()
    {
        SwipeDetection.SwipeEvent += OnSwipe;
    }

    private void OnDisable()
    {
        SwipeDetection.SwipeEvent -= OnSwipe;
    }

    private void Awake()
    {
        rb = GetComponent<Rigidbody>();
    }

    private void FixedUpdate()
    {
        if (isMoving)
            Move(currentDirection);
    }

    private void OnSwipe(Vector2 direction)
    {
        Vector3 direct = direction == Vector2.up ? Vector3.forward :
            direction == Vector2.down ? Vector3.back : (Vector3)direction;
        if (gameObject.tag == "Player")
        {
            //Debug.Log(CheckDirect(direct));
            //Debug.Log(isMoving);
            Debug.Log(rb.velocity);
        }
        if (CheckDirect(direct) && !isMoving)
        {
            currentDirection = direct;
            StartMovement();
            
        }
    }

    private void Move(Vector3 direction)
    {
        rb.velocity += direction * Time.deltaTime * forceValue;
    }

    private bool CheckDirect(Vector3 direction)
    {
        foreach(Vector3 direct in directions)
        {
            if (direction == direct)
                return true;
        }

        return false;
    }

    public void StartMovement()
    {
        isMoving = true;
    }

    public void StopMovement()
    {
        isMoving = false;
        rb.velocity = Vector3.zero;
    }
}
