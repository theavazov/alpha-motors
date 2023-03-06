import { Layout } from "../../components/Layout";
import { Location } from "../../components/location/Location";
import { CustomHead } from "../../components/CustomHead";
import { Form } from "../../components/form/Form";
import { useEffect, useState } from "react";
import axios from "axios";

export default function AboutPage() {
  const [vehicles, setVehicles] = useState<any>([]);

  useEffect(() => {
    axios
      .get("/api/vehicles")
      .then((res) => {
        console.log(res.data);
        setVehicles(res.data);
      })
      .catch((e) => console.log(e));
  }, []);

  return (
    <>
      <CustomHead title={"Alpha motors | Cars"} />
      <Layout>
        <Location title="Cars" location="Cars" />
        <Form />
      </Layout>
    </>
  );
}
