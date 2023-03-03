import styles from "./Spinner.module.css";
const Spinner = () => {
  return (
    <>
      <div
        className={`text-center mt-5 d-block m-auto ${styles["spinner-div"]}`}
      >
        <div className={`spinner-border mt-5 ${styles.spinner}`} role="status">
          <span className="sr-only">Loading...</span>
        </div>
      </div>
    </>
  );
};
export default Spinner;
