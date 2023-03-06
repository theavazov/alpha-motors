import axios from "axios";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import { CustomHead } from "../../components/CustomHead";
import { Form } from "../../components/form/Form";
import { Layout } from "../../components/Layout";
import { Location } from "../../components/location/Location";

export default function AboutPage() {
  const router = useRouter();
  const { id } = router.query;

  const [vehicle, setVehicle] = useState<any>({});

  useEffect(() => {
    axios
      .get(`/api/vehicles/${id}`)
      .then((res) => {
        console.log(res.data);
        setVehicle(res.data);
      })
      .catch((e) => console.log(e));
  }, [id]);

  return (
    <>
      <CustomHead title={"Alpha motors | Vehicle inner page"} />
      <Layout>
        <Location
          parent={{ text: "Cars", url: "/vehicles" }}
          title="Inner page"
          location="Inner page"
        />
        <section className="section">
          <div className="box section_inner">
            <h3 className="section_title">Vehicles</h3>
            <div className="vehicles_container"></div>
          </div>
        </section>
        <Form />
      </Layout>
    </>
  );
}
