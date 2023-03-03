import styles from "../../CruiseForm/CruiseForm.module.css";
const GlobalFilter = ({ filter, setFilter }) => {
  return (
    <>
      <span
        style={{
          textAlign: "center",
          backgroundColor: "aliceblue",
          fontWeight: "bold",
          fontSize: "smaller",
          display: "block",
        }}
      >
        Key Word{" "}
        <input
          style={{ backgroundColor: "aliceblue", lineHeight: "20px" }}
          className={`single-input d-block m-auto input-group-sm d-inline-block  ${styles["single-input"]}`}
          onChange={(e) => setFilter(e.target.value)}
        />
      </span>
    </>
  );
};
export default GlobalFilter;
